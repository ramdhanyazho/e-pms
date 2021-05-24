<?php

namespace App\Http\Controllers;

use Excel;
use App\Bsc;
use App\Faq;
use App\Logz;
use DateTime;
use Response;
use App\Group;
use App\Orgdev;
use App\Company;
use App\Pangkat;
use App\Setting;
use App\Activiti;
use App\Division;
use App\Employee;
use App\Golongan;
use App\Location;
use App\Position;
use App\KPIExport;
use Carbon\Carbon;
use App\CostCenter;
use App\KpiTemplate;
use App\Announcement;
use App\EmployeeKpis;
use App\BusinessUnits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class OrgDevController extends Controller
{
    public function __construct() {}

    private function getMenuTitle($path) {
        switch (strtolower($path)) {
            case 'od/dashboard':
                return 'Dashboard';
            case 'od/people':
                return 'People';
            case 'od/evaluation':
                return 'My Evaluation';
            case 'od/kpi':
                return 'Personal KPI';
            case 'od/kpi/subordinate':
                return 'Subordinate KPI';
            case 'od/kpi/review':
                return 'Review KPI';
            case 'od/announcement':
                return 'Announcement';
            case 'od/activity':
                return 'Activity';
            case 'od/faq':
                return 'Frequently Asked Questions (FAQ)';
            default:
                return '';
        }
    }

    private function getSidebarData() {
        $authUser = Auth::user();
        $currentPath = request()->path();
        $menuTitle = $this->getMenuTitle($currentPath);
        $employee = Employee::find(Auth::user()->id);
        return array('auth_user' => $authUser,
            'current_path' => $currentPath,
            'menu_title' => $menuTitle,
            'employee' => $employee);
    }

    private function getContentData() {
        $authUser = Auth::user();
        return array('auth_user' => $authUser);
    }

    public function viewDashboard() {
        $data['periods'] = $this->getPeriods();
        $data['companies'] = $this->getCompanies();
        $data['locations'] = $this->getLocations();
        $data['costcenters'] = $this->getCostCenters();

        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();

        $me = Orgdev::find(Auth::user()->id);
        $data['tasks_count'] = count($me->getTasks());
        $data['tasks'] = $me->getTasks();
        $data['kpi_completed'] = $me->getODKPICompleted();
        $data['kpi_on_progress'] = $me->getODKPIProgress();
        $data['kpi_unprocessed'] = $me->getODKPIUnprocessed();
        return view('ods.dashboard', $data);
    }

    public function viewDashboard2() {
        $data['periods'] = $this->getPeriods();
        $data['companies'] = $this->getCompanies();
        $data['locations'] = $this->getLocations();
        $data['costcenters'] = $this->getCostCenters();

        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();

        $me = Orgdev::find(Auth::user()->id);
        $data['tasks_count'] = count($me->getTasks());
        $data['tasks'] = $me->getTasks();
        $data['kpi_completed'] = $me->getODKPICompleted();
        $data['kpi_on_progress'] = $me->getODKPIProgress();
        $data['kpi_unprocessed'] = $me->getODKPIUnprocessed();
        return view('ods.dashboard2', $data);
    }

    public function viewAllPeople(Request $request) {
        $data['companies'] = $this->getCompanies();

        if ($request->input('company_id') != null) {
            $locations = $this->getLocationsByCompanyId($request->input('company_id'));
        } else {
            $locations = $this->getLocations();
        }
        $data['locations'] = $locations;

        if ($request->input('company_id') != null) {
            if ($request->input('location_id') != null) {
                $costcenters = $this->getCostCentersByLocation($request->input('location_id'));
            } else {
                $costcenters = $this->getCostCentersByCompany($request->input('company_id'));
            }
        } else {
            $costcenters = $this->getCostCenters();
        }
        $data['costcenters'] = $costcenters;

        $data['status'] = $this->getStatus();

        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();
        $data['filter'] = $request->all();
        $qryFilter = array();   
        if($request->input('people') != null) array_push($qryFilter, ['name', 'ilike', '%'. $request->input('people') . '%']);
        if($request->input('company_id') != null) array_push($qryFilter, ['company_id', $request->input('company_id')]);
        if($request->input('cost_center_id') != null) array_push($qryFilter, ['costcenter_id', $request->input('cost_center_id')]);
        if($request->input('location_id') != null) array_push($qryFilter, ['location_id', $request->input('location_id')]);

        $data['superiors'] = Employee::orderBy('name', 'ASC')->get();
        $data['people'] = Employee::where($qryFilter)
                    ->orderBy('golongan_id', 'ASC')
                    ->orderBy('name', 'ASC')->paginate(config('app.items_per_page'));
        return view('ods.people', $data);
    }

    public function downloadKPI(Request $request, $userId, $year) {
        $user = Employee::where('id', $userId)->first();
        return Excel::download(new KPIExport($user, $year), 'kpi.xlsx');
    }

    public function downloadAllPeople(Request $request) {
        $employees = Employee::all();
        $filename = '../storage/app/all_employees.csv';
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('NIK',
                                'Nama',
                                'Email',
                                'Jabatan',
                                'Status',
                                'Cost Center',
                                'Join Date',
                                'Unit',
                                'Location',
                                'End of Contract',
                                'Company',
                                'Status Terminasi',
                                'NIK Superior',
                                'Nama Superior'
                            )
        );

        foreach ($employees as $em) {
            $superordinateNIK = $em->getSuperOrdinateNIK();
            $superordinate = Employee::where('nik', $superordinateNIK)->first();
            $superordinateName = '';
            if ($superordinate != null) {
                $superordinateName = $superordinate->getName();
            }

            fputcsv($handle, array($em->getNIK(),
                                    $em->getName(),
                                    $em->getEmail(),
                                    $em->getPositionId(),
                                    $em->getStatus(),
                                    $em->costcenter->getName(),
                                    $em->getJoinDate(),
                                    '1',
                                    $em->location->getName(),
                                    $em->getEndContract(),
                                    $em->company->getName(),
                                    $em->isTerminated() ? 'Terminated' : 'Active',
                                    $superordinateNIK,
                                    $superordinateName
                                )
            );
        }

        fclose($handle);
        $headers = array('Content-Type' => 'text/csv');
        return Response::download($filename, 'all_employees.csv', $headers);
    }

    public function viewEvaluation(Request $request) {
        $data['periods'] = $this->getPeriods();     
        $data['companies'] = $this->getCompanies();
        $data['locations'] = $this->getLocations();
        $data['costcenters'] = $this->getCostCenters();
        $data['filter'] = $request->all();
        $qryFilter = array();
        if($request->input('company_id') != null) $qryFilter += ['company_id' => $request->input('company_id')];
        if($request->input('cost_center_id') != null) $qryFilter +=  ['costcenter_id' => $request->input('cost_center_id')];
        if($request->input('location_id') != null) $qryFilter +=  ['location_id' => $request->input('location_id')];
        if($request->input('name') != null) array_push($qryFilter, ['name', 'ilike', '%'. $request->input('name') . '%']);
        if($request->input('org_unit_id') != null) $qryFilter +=  ['org_unit_id' => $request->input('org_unit_id')];

        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();
        $people = Employee::where($qryFilter);
        if ($request->input('employee') != null) {
            $people->where('name', 'ILIKE', '%' . $request->input('employee') . '%');
        }
        $data['people'] = $people->orderBy('golongan_id', 'ASC')
                            ->orderBy('name', 'ASC')->paginate(config('app.items_per_page'));

        return view('ods.evaluation', $data);
    }

    public function viewAnnouncement(Request $request) {
        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();
        $data['groups'] = Group::orderBy('id', 'desc')->get();
        $data['keyword'] = $request->input('q');
        $data['announcements'] = (new Announcement)->getAll($request->q);
        return view('ods.announcement', $data);
    }

    public function setAnnouncementActive($id) {
        $announcement = Announcement::findOrFail($id);
        $announcement->status = 1;
        $announcement->save();
        return Response::json(['status' => 200, 'message' => 'OK']);
    }

    public function setAnnouncementInactive($id) {
        $announcement = Announcement::findOrFail($id);
        $announcement->status = 0;
        $announcement->save();
        return Response::json(['status' => 200, 'message' => 'OK']);
    }

    public function deleteAnnouncement($id) {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();
        return Response::json(['status' => 200, 'message' => 'OK']);
    }

    public function viewActivity(Request $request) {
        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();
        $me = $this->getMe();
        $data['me'] = $me;
        $data['users'] = Employee::orderBy('name', 'ASC')->get();

        $data['filter'] = $request->all();
        $qryFilter = array();

        if ($request->input('startdate') != null) {
            $startDate = Carbon::createFromFormat('d/m/Y', $request->input('startdate'));
            array_push($qryFilter, ['created_at', '>=', $startDate->format('Y-m-d') . ' 00:00:00']);
        } 
        if ($request->input('enddate') != null) {
            $endDate = Carbon::createFromFormat('d/m/Y', $request->input('enddate'));
            array_push($qryFilter, ['created_at', '<=', $endDate->format('Y-m-d') . ' 23:59:59']);
        }
        if($request->input('user') != null) array_push($qryFilter, ['user_id', $request->input('user')]);
        if($request->input('action') != null) {
            $words = explode(' ', $request->input('action'));
            $wordsQuery = implode('%', $words);
            array_push($qryFilter, ['action', 'ilike', '%' . $wordsQuery . '%']);
        }

        $data['activities'] = Activiti::where($qryFilter)
                                ->orderBy('created_at','desc')
                                ->paginate(config('app.items_per_page'));

        return view('ods.activity', $data);

    }

    public function viewAuditTrail(Request $request) {
        $startDate = null;
        $endDate = date('Y-m-d');
        $period = date('Y');

        if($request->input('period') != null) {
            $period = $request->input('period');
        }

        if($request->input('startdate') != null) {
            $dateTemp = str_replace('/', '-', $request->input('startdate') );
            $startDate = date("Y-m-d", strtotime($dateTemp));
        }

        if($request->input('enddate') != null) {
            $dateTemp = str_replace('/', '-', $request->input('enddate') );
            $endDate = date("Y-m-d", strtotime($dateTemp));
        }

        $data['periods'] = $this->getPeriods();
        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();
        $data['users'] = Employee::get();
        $me = $this->getMe();
        $data['me'] = $me;
        $data['actions'] = Logz::select('page')
                                ->where('type', 'log')
                                ->groupBy('page')
                                ->get();
        $data['filter'] = $request->all();
        $qryFilter = array();

        if($request->input('user') != null) $qryFilter +=  ['user_id' => $request->input('user')];
        if($request->input('action') != null) $qryFilter +=  ['page' => $request->input('action')];
        if($startDate != null) {
            $data['logs'] = Logz::where('type', 'log')
                                ->where($qryFilter)
                                ->whereDate('created_at', '>=', $startDate)
                                ->whereDate('created_at', '<=', $endDate)
                                ->whereYear('created_at', '=', $period)
                                ->orderBy('created_at','desc')
                                ->paginate(config('app.items_per_page'));
        } else {
            $data['logs'] = Logz::where('type', 'log')
                                ->where($qryFilter)
                                ->whereDate('created_at', '<=', $endDate)
                                ->whereYear('created_at', '=', $period)
                                ->orderBy('created_at','desc')
                                ->paginate(config('app.items_per_page'));
        }
        return view('ods.logs', $data);
    }

    public function viewFAQ() {
        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();

        $data['faqs'] = Faq::orderBy('updated_at', 'DESC')->get();
        return view('ods.faq', $data);
    }

    public function addNewFAQ(Request $request) {
        $dataFaq = array(
            'title' => $request->question,
            'description' => $request->answer
        );

        $insert = Faq::create($dataFaq);

        return Response::json(['code' => 200, 'message' => 'Input success']);
    }

    public function updateFAQ(Request $request) {
        $faq = Faq::findOrFail($request->faq_id);

        $faq->title = $request->question;
        $faq->description = $request->answer;
        $faq->save();

        return Response::json(['code' => 200, 'message' => 'Update success']);
    }

    public function deleteFAQ($id) {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return Response::json(['code' => 200, 'message' => 'Delete success']);
    }

    public function saveSuperior(Request $request) {
        $emp = Employee::find($request->input('user_id'));
        $previousSuperior = $emp->getSuperOrdinate();
        $emp->superordinate_nik = $request->input('superior_id');
        $newSuperior = Employee::where('nik', $request->superior_id)->first();
        $emp->save();

        $this->recordActivity('is changing <strong>' . $emp->getName() . ' - ' . $emp->getNIK() . '</strong> superordinate:<br>
                From: <strong>' . $previousSuperior->getName() . ' - ' . $previousSuperior->getNIK() . '</strong><br>
                To: <strong>' . $newSuperior->getName() . ' - ' . $newSuperior->getNIK() . '</strong>');

        return redirect('od/people');
    }

    public function saveSubordinate(Request $request) {
        Employee::whereIn('nik', $request->input('subordinate_nik'))
            ->update(['superordinate_nik' => $request->input('user_id')]);
            
        return redirect('od/people');
    }

    public function changePassword(Request $request) {
        $nik = $request->input('nik');
        $passwd = $request->input('passwd_' . $nik);
        $repeat_passwd = $request->input('repeat_passwd_' . $nik);

        if ($passwd != $repeat_passwd) {
            return redirect('/od/people')->with('message', 'Password doesn\'t match.');
        }

        $employee = Employee::where('nik', $nik)->first();
        if ($employee == null) return redirect('/od/people')->with('message', 'Employee with NIK ' . $nik . ' is not found.');

        $employee->password = Hash::make($passwd);
        $result = $employee->save();
        return redirect('/od/people')->with('message', 'Password successfully changed for ' . $employee->getName());
    }

    public function viewEvaluationSingle(Request $request, $employeeId) {
        if($request->input('year') == null) {
            $year = intval(date("Y"));
        } else {
            $year = $request->input('year');
        }

        $kpiTrack = array();
        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();
        $data['me'] = Employee::find($employeeId);
        $data['super_ordinate'] = $data['me']->getSuperOrdinate();
        $data['subordinate'] = $data['me']->getSubordinate();
        $data['bscs'] = Bsc::orderBy('name', 'ASC')->get();
        $data['kpis'] = EmployeeKpis::where('employee_id', $employeeId)
                            ->where('year', $year)
                            ->orderBy('created_at', 'desc')
                            ->get();

        foreach($data['kpis'] as $kpi) {
            $histories = $kpi->getHistory;
            foreach ($histories as $history ) {
                $kpiTrack[$history->employee_kpis_id]['title'] = $kpi->kpiTemplate->kpi->getName();
                $kpiTrack[$history->employee_kpis_id]['actual'][$history->month] = $history->actual;
            }
        }                    

        $data['kpi_track'] = $kpiTrack;
        $data['year'] = $year;
        return view('ods.evaluation-single', $data);
    }

    public function SaveAnnouncement(Request $request) {
        if (strtolower($request->to) == 'all') {
            $groupId = 6;
        } else {
            $group = Group::where('name', $request->to)->first();
            if($group) {
                $groupId = $group->id;
            } else {
                $groupId = 0;
            }
        } 

        if ($groupId != 0) {
            $data = array(
                'from'          => $this->getMe()->getId(),
                'to_group_id'   => $groupId,
                'title'         => $request->title,
                'contents'       => $request->content,
                'status'        => 1,
            );
            Announcement::create($data);
            return Response::json(['code' => 200, 'message' => 'input success']);
        } else {
            return Response::json(['code' => 500, 'message' => 'input fail']);
        }
        
    }

    public function saveKPI(Request $request) {
        $data = array(
                'employee_id'   => $request->employee_id,
                'year'          => $request->year,
                'kpi_id'        => $request->kpi_id,
                'weight'        => $request->weight,
                'target'        => $request->target,
                'indicators'    => json_encode([ 
                    "indicator1" => $request->indicator1, 
                    "indicator2" => $request->indicator2, 
                    "indicator3" => $request->indicator3, 
                    "indicator4" => $request->indicator4, 
                    "indicator5" => $request->indicator5]),
                'actual'        => 0,
            );
        EmployeeKpis::create($data);

        return redirect('od/evaluation/' . $request->employee_id);
    }

    public function viewSetting(Request $request) {
        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();
        $data['deadline'] = Setting::getDeadline();
        $data['bscs'] = Bsc::orderBy('name', 'ASC')->get();

        return view('ods.setting', $data);
    }

    public function setDeadline(Request $request) {
        $deadline = $request->deadline;
        Setting::create(['deadline' => date('Y-m-d', strtotime($deadline))]);
        return redirect('od/setting')->with('message', 'update success');
    }

    public function showMutasi() {
        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();
        $data['mutationEmployees'] = Employee::where('status', 9)
                                    ->orderBy('updated_at', 'DESC')
                                    ->paginate(config('app.items_per_page'));
        return view('ods.newmutasi', $data);
    }

    // Method to handle NEW EMPLOYEE
    // -- Start here --
    public function showNewEmployee() {
        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();
        return view('ods.newemployee', $data);
    }

    public function downloadNewEmployeeTemplate() {
        return Storage::download('newemployee.csv');
    }

    public function uploadNewEmployeeCSV(Request $request) {
        if (!$request->hasFile('newemployeecsv')) {
            $this->recordActivity('is <strong>uploading New Employee CSV but no file attached.</strong>');
            return redirect('/od/mutasi/new')->with('error', 'Upload error: No file attached.');
        }

        if (!$request->file('newemployeecsv')->isValid()) {
            $this->recordActivity('is <strong>uploading New Employee CSV but not a valid file attached.</strong>');
            return redirect('/od/mutasi/new')->with('error', 'Upload error: not a valid file.');
        }

        $extension = $request->newemployeecsv->extension();
        if ($extension != 'csv' && $extension != 'txt') {
            $this->recordActivity('is <strong>uploading New Employee CSV but file is not a csv file.</strong>');
            return redirect('/od/mutasi/new')->with('error', 'Upload error: File is not a csv file.');
        }

        $request->validate([
            'newemployeecsv' => 'required|mimes:csv,txt|max:2048',
        ]);

        $isTest = false;
        if ($request->has('btn_test_upload') && $request->btn_test_upload == 'Test File') {
            $this->recordActivity('is <strong>uploading New Employee CSV in test mode.</strong>');
            $isTest = true;
        }

        $newEmployeeCsv = $request->newemployeecsv;

        $result = array();

        if ($isTest) {
            if (($handle = fopen($newEmployeeCsv, "r")) !== FALSE) {
                $row = 0;
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    $row++;
                    if ($data[0] == 'NIK') continue;

                    // check for empty columns
                    $possibleEmpties = array(7, 10);
                    for ($col = 0; $col <= 19; $col++) {
                        if (in_array($col, $possibleEmpties)) continue;
                        if ($data[$col] == null || $data[$col] == '') {
                            $itemResult = array('Row: ' . $row, 'Col: ' . ($col + 1), 'Empty field.');
                            array_push($result, $itemResult);
                        }
                    }

                    $employee = Employee::where('nik', utf8_decode($data[0]))->first();
                    if ($employee != null) {
                        $itemResult = array('Row: ' . $row, $data[0], 'Failed. Employee with that NIK exists.');
                        array_push($result, $itemResult);                
                    }
                    
                    $tanggalMasuk = explode('/', $data[6]);
                    if (count($tanggalMasuk) != 3 || !checkdate($tanggalMasuk[1], $tanggalMasuk[0], $tanggalMasuk[2])) {
                        $itemResult = array('Row: ' . $row, $data[6], 'Date format of Tanggal Masuk is invalid.');
                        array_push($result, $itemResult);
                    }

                    if ($data[7] != '') {
                        $tanggalBerhenti = explode('/', $data[7]);
                        if (count($tanggalBerhenti) != 3 || !checkdate($tanggalBerhenti[1], $tanggalBerhenti[0], $tanggalBerhenti[2])) {
                            $itemResult = array('Row: ' . $row, $data[7], 'Date format of Tanggal Berhenti is invalid.');
                            array_push($result, $itemResult);
                        }
                    }

                    // Cost Center
                    $costCenter = trim($data[8]);
                    if ($costCenter == '') {
                        $itemResult = array('Row: ' . $row, $costCenter, 'Cost Center can\'t be empty.');
                        array_push($result, $itemResult);
                    } else {
                        $cc = CostCenter::where('name', $costCenter)->first();
                        if ($cc == null) {
                            $itemResult = array('Row: ' . $row, $costCenter, 'Cost Center doesn\'t exist.');
                            array_push($result, $itemResult);
                        }
                    }

                    // Start kontrak and end kontrak
                    if ($data[9] != '') {
                        $startKontrak = explode('/', $data[9]);
                        if (count($startKontrak) != 3 || !checkdate($startKontrak[1], $startKontrak[0], $startKontrak[2])) {
                            $itemResult = array('Row: ' . $row, $data[9], 'Date format of Start Kontrak is invalid.');
                            array_push($result, $itemResult);
                        }    
                    }
                    
                    if ($data[10] != '') {
                        $endKontrak = explode('/', $data[10]);
                        if (count($endKontrak) != 3 || !checkdate($endKontrak[1], $endKontrak[0], $endKontrak[2])) {
                            $itemResult = array('Row: ' . $row, $data[10], 'Date format of End Kontrak is invalid.');
                            array_push($result, $itemResult);
                        }
                    }

                    // Email
                    $email = trim($data[11]);
                    Log::info($email);
                    if ($email != '') {
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $itemResult = array('Row: ' . $row, $email, 'Email is in invalid form.');
                            array_push($result, $itemResult);
                        }    
                    }

                    // Pangkat
                    $pangkat = trim($data[12]);
                    if ($pangkat == '') {
                        $itemResult = array('Row: ' . $row, $pangkat, 'Pangkat can\'t be empty.');
                        array_push($result, $itemResult);
                    } else {
                        $pkt = Pangkat::where('name', $pangkat)->first();
                        if ($pkt == null) {
                            $itemResult = array('Row: ' . $row, $pangkat, 'Pangkat does\'t exist in database.');
                            array_push($result, $itemResult);
                        }
                    }

                    // Golongan
                    $golongan = trim($data[13]);
                    if ($golongan == '') {
                        $itemResult = array('Row: ' . $row, $golongan, 'Golongan can\'t be empty.');
                        array_push($result, $itemResult);
                    } else {
                        $glg = Golongan::where('name', $golongan)->first();
                        if ($glg == null) {
                            $itemResult = array('Row: ' . $row, $golongan, 'Golongan doesn\'t exist in database.');
                            array_push($result, $itemResult);
                        }
                    }

                    // Unit Org
                    $orgUnit = trim($data[14]);
                    if ($orgUnit == '') {
                        $itemResult = array('Row: ' . $row, $orgUnit, 'Org Unit can\'t be empty.');
                        array_push($result, $itemResult);
                    } 
                    // else {
                    //     $div = Division::where('name', $orgUnit)->first();
                    //     if ($div == null) {
                    //         $itemResult = array('Row: ' . $row, $orgUnit, 'Org Unit doesn\'t exist in database.');
                    //         array_push($result, $itemResult);
                    //     }
                    // }

                    // Posisi
                    $position = trim($data[15]);
                    if ($position == '') {
                        $itemResult = array('Row: ' . $row, $position, 'Position can\'t be empty.');
                        array_push($result, $itemResult);
                    } 
                    // else {
                    //     $pos = Position::where('name', $position)->first();
                    //     if ($pos == null) {
                    //         $itemResult = array('Row: ' . $row, $position, 'Position doesn\'t exist in database.');
                    //         array_push($result, $itemResult);
                    //     }
                    // }

                    // NIK Atasan
                    $nikSuperior = trim($data[17]);
                    if ($nikSuperior == '') {
                        $itemResult = array('Row: ' . $row, $nikSuperior, 'NIK Atasan can\'t be empty.');
                        array_push($result, $itemResult);
                    } else {
                        $nikSup = Employee::where('nik', $nikSuperior)->first();
                        if ($nikSup == null) {
                            $itemResult = array('Row: ' . $row, $nikSuperior, 'NIK Atasan doesn\'t exist in database.');
                            array_push($result, $itemResult);
                        }
                    }

                    if (count($result) == 0) {
                        $itemResult = array('All rows', 'All columns', 'Passed.');
                        array_push($result, $itemResult);
                    }
                }
            }
        } else {
            if (($handle = fopen($newEmployeeCsv, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    if ($data[0] == 'NIK') continue;
                    $nik = $this->getNIK(trim($data[0]));
                    if ($this->isNIKExist(trim($nik))) continue;
                    $name = $this->getName(trim($data[1]));
                    $status = $this->getEmployeeStatus(trim($data[2]));
                    $locationId = $this->getLocation(trim($data[3]));
                    $businessUnitId = $this->getBusinessUnit(trim($data[4]));
                    $companyId = $this->getCompany(trim($data[5]));
                    $joinDate = $this->getJoinDate(trim($data[6]));
                    $quitDate = $this->getQuitDate(trim($data[7]));
                    $costCenterId = $this->getCostCenter(trim($data[8]));
                    $contractStart = $this->getContractStart(trim($data[9]));
                    $contractEnded = $this->getContractEnded(trim($data[10]));
                    $email = $this->getEmail(trim($data[11]));
                    $pangkat = $this->getPangkat(trim($data[12]));
                    $golongan = $this->getGolongan(trim($data[13]));
                    $orgUnitId = $this->getOrgUnit(trim($data[14]));
                    $title = $this->getPosition(trim($data[15]));
                    $level = $this->getLevel(trim($data[16]));
                    $superordinateId = null;
                    $superordinateNIK = $this->getSuperOrdinateNIK(trim($data[17]));
    
                    $em = new Employee;
                    $em->name = $name;
                    $em->email = $email;
                    $em->nik = $nik;
                    $em->level = 1;
                    $em->group_id = 1;
                    $em->position_id = $title;
                    $em->status = $status;
                    $em->business_unit_id = $businessUnitId;
                    $em->org_unit_id = $orgUnitId;
                    $em->location_id = $locationId;
                    $em->join_date = $joinDate;
                    $em->quit_date = $quitDate;
                    $em->contract_start = $contractStart;
                    $em->contract_ended = $contractEnded;
                    $em->title = $data[15];
                    $em->company_id = $companyId;
                    $em->costcenter_id = $costCenterId;
                    $em->pangkat_id = $pangkat;
                    $em->golongan_id = $golongan;
                    $em->superordinate_nik = $superordinateNIK;
                    $em->password = Hash::make(env('PASSWORD_DEFAULT_FOR_ALL_USERS'));
                    $em->acl_assigned_id = env('ACL_ASSIGNED_ID_DEFAULT');
                    $em->save();

                    $itemResult = array('NIK: ' . $nik, $name, 'Added.');
                    array_push($result, $itemResult);                        
                }
                fclose($handle);

                $itemResult = array('New employee(s) successfully uploaded', 'Warning: 0', 'Error: 0');
                array_push($result, $itemResult);                        
            }           
        }

        return redirect('/od/mutasi/new')->with('result', $result);        
    }
    // -- end here --

    // Method to handle EMPLOYEE MUTATION
    // -- Start here --
    public function showMutasiMutation() {
        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();
        return view('ods.mutasimutation', $data);
    }
    public function downloadMutation() {
        return Storage::download('mutation.csv');
    }

    public function uploadMutationCSV(Request $request) {
        if (!$request->hasFile('mutationcsv')) {
            $this->recordActivity('is <strong>uploading Mutation CSV but no file attached.</strong>');
            return redirect('/od/mutasi/mutation')->with('error', 'Upload error: No file attached.');
        }

        if (!$request->file('mutationcsv')->isValid()) {
            $this->recordActivity('is <strong>uploading Mutation CSV but not a valid file attached.</strong>');
            return redirect('/od/mutasi/mutation')->with('error', 'Upload error: not a valid file.');
        }

        $extension = $request->mutationcsv->extension();
        if ($extension != 'csv' && $extension != 'txt') {
            $this->recordActivity('is <strong>uploading Mutation CSV but file is not a csv file.</strong>');
            return redirect('/od/mutasi/mutation')->with('error', 'Upload error: File is not a csv file.');
        }

        $request->validate([
            'mutationcsv' => 'required|mimes:csv,txt|max:2048',
        ]);

        $isTest = false;
        if ($request->has('btn_test_upload') && $request->btn_test_upload == 'Test File') {
            $this->recordActivity('is <strong>uploading Mutation CSV in test mode.</strong>');
            $isTest = true;
        }

        $mutationCsv = $request->mutationcsv;

        $result = array();

        if ($isTest) {
            if (($handle = fopen($mutationCsv, "r")) !== FALSE) {
                $row = 0;
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    $row++;
                    if ($data[0] == 'NIK' || $data[1] == 'Nama karyawan' || $data[2] == 'Status Karyawan') continue;

                    // check for empty columns
                    $possibleEmpties = array(7, 9, 10);
                    for ($col = 0; $col <= 19; $col++) {
                        if (in_array($col, $possibleEmpties)) continue;
                        if ($data[$col] == null || $data[$col] == '') {
                            $itemResult = array('Row: ' . $row, 'Col: ' . ($col + 1), 'Empty field.');
                            array_push($result, $itemResult);
                        }
                    }

                    $employee = Employee::where('nik', utf8_decode($data[0]))->first();
                    if ($employee == null) {
                        $itemResult = array('Row: ' . $row, $data[0], 'Failed. No employee with NIK: ' . utf8_decode($data[0]));
                        array_push($result, $itemResult);                
                    }
                    
                    $tanggalMasuk = explode('/', $data[6]);
                    if (count($tanggalMasuk) != 3 || !checkdate($tanggalMasuk[1], $tanggalMasuk[0], $tanggalMasuk[2])) {
                        $itemResult = array('Row: ' . $row, $data[6], 'Date format of Tanggal Masuk is invalid.');
                        array_push($result, $itemResult);
                    }

                    if ($data[7] != '') {
                        $tanggalBerhenti = explode('/', $data[7]);
                        if (count($tanggalBerhenti) != 3 || !checkdate($tanggalBerhenti[1], $tanggalBerhenti[0], $tanggalBerhenti[2])) {
                            $itemResult = array('Row: ' . $row, $data[7], 'Date format of Tanggal Berhenti is invalid.');
                            array_push($result, $itemResult);
                        }
                    }

                    // Cost Center
                    $costCenter = trim($data[8]);
                    if ($costCenter == '') {
                        $itemResult = array('Row: ' . $row, $costCenter, 'Cost Center can\'t be empty.');
                        array_push($result, $itemResult);
                    } else {
                        $cc = CostCenter::where('name', 'ILIKE', $costCenter)->first();
                        if ($cc == null) {
                            $itemResult = array('Row: ' . $row, $costCenter, 'Cost Center doesn\'t exist.');
                            array_push($result, $itemResult);
                        }
                    }

                    // Start kontrak and end kontrak
                    if ($data[9] != '') {
                        $startKontrak = explode('/', $data[9]);
                        if (count($startKontrak) != 3 || !checkdate($startKontrak[1], $startKontrak[0], $startKontrak[2])) {
                            $itemResult = array('Row: ' . $row, $data[9], 'Date format of Start Kontrak is invalid.');
                            array_push($result, $itemResult);
                        }    
                    }
                    
                    if ($data[10] != '') {
                        $endKontrak = explode('/', $data[10]);
                        if (count($endKontrak) != 3 || !checkdate($endKontrak[1], $endKontrak[0], $endKontrak[2])) {
                            $itemResult = array('Row: ' . $row, $data[10], 'Date format of End Kontrak is invalid.');
                            array_push($result, $itemResult);
                        }
                    }

                    // Email
                    $email = trim($data[11]);
                    Log::info($email);
                    if ($email != '') {
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $itemResult = array('Row: ' . $row, $email, 'Email is in invalid form.');
                            array_push($result, $itemResult);
                        }    
                    }

                    // Pangkat
                    $pangkat = trim($data[12]);
                    if ($pangkat == '') {
                        $itemResult = array('Row: ' . $row, $pangkat, 'Pangkat can\'t be empty.');
                        array_push($result, $itemResult);
                    } else {
                        $pkt = Pangkat::where('name', $pangkat)->first();
                        if ($pkt == null) {
                            $itemResult = array('Row: ' . $row, $pangkat, 'Pangkat does\'t exist in database.');
                            array_push($result, $itemResult);
                        }
                    }

                    // Golongan
                    $golongan = trim($data[13]);
                    if ($golongan == '') {
                        $itemResult = array('Row: ' . $row, $golongan, 'Golongan can\'t be empty.');
                        array_push($result, $itemResult);
                    } else {
                        $glg = Golongan::where('name', 'ILIKE', $golongan)->first();
                        if ($glg == null) {
                            $itemResult = array('Row: ' . $row, $golongan, 'Golongan doesn\'t exist in database.');
                            array_push($result, $itemResult);
                        }
                    }

                    // Unit Org
                    $orgUnit = trim($data[14]);
                    if ($orgUnit == '') {
                        $itemResult = array('Row: ' . $row, $orgUnit, 'Org Unit can\'t be empty.');
                        array_push($result, $itemResult);
                    } 
                    // else {
                    //     $div = Division::where('name', $orgUnit)->first();
                    //     if ($div == null) {
                    //         $itemResult = array('Row: ' . $row, $orgUnit, 'Org Unit doesn\'t exist in database.');
                    //         array_push($result, $itemResult);
                    //     }
                    // }

                    // Posisi
                    $position = trim($data[15]);
                    if ($position == '') {
                        $itemResult = array('Row: ' . $row, $position, 'Position can\'t be empty.');
                        array_push($result, $itemResult);
                    } 
                    // else {
                    //     $pos = Position::where('name', $position)->first();
                    //     if ($pos == null) {
                    //         $itemResult = array('Row: ' . $row, $position, 'Position doesn\'t exist in database.');
                    //         array_push($result, $itemResult);
                    //     }
                    // }

                    // NIK Atasan
                    $nikSuperior = trim($data[17]);
                    if ($nikSuperior == '') {
                        $itemResult = array('Row: ' . $row, $nikSuperior, 'NIK Atasan can\'t be empty.');
                        array_push($result, $itemResult);
                    } else {
                        $nikSup = Employee::where('nik', $nikSuperior)->first();
                        if ($nikSup == null) {
                            $itemResult = array('Row: ' . $row, $nikSuperior, 'NIK Atasan doesn\'t exist in database.');
                            array_push($result, $itemResult);
                        }
                    }
                }

                if (count($result) == 0) {
                    $itemResult = array('All rows', 'All columns', 'Passed.');
                    array_push($result, $itemResult);
                }
            }
        } else {
            if (($handle = fopen($mutationCsv, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    if ($data[0] == 'NIK') continue;
                    $nik = $this->getNIK(trim($data[0]));
                    if (!$this->isNIKExist(trim($nik))) continue;
                    $em = Employee::where('nik', trim($nik))->first();
                    if ($em == null) continue;
                    $name = $this->getName(trim($data[1]));
                    $status = $this->getEmployeeStatus(trim($data[2]));
                    $locationId = $this->getLocation(trim($data[3]));
                    $businessUnitId = $this->getBusinessUnit(trim($data[4]));
                    $companyId = $this->getCompany(trim($data[5]));
                    $joinDate = $this->getJoinDate(trim($data[6]));
                    $quitDate = $this->getQuitDate(trim($data[7]));
                    $costCenterId = $this->getCostCenter(trim($data[8]));
                    $contractStart = $this->getContractStart(trim($data[9]));
                    $contractEnded = $this->getContractEnded(trim($data[10]));
                    $email = $this->getEmail(trim($data[11]));
                    $pangkat = $this->getPangkat(trim($data[12]));
                    $golongan = $this->getGolongan(trim($data[13]));
                    $orgUnitId = $this->getOrgUnit(trim($data[14]));
                    $title = $this->getPosition(trim($data[15]));
                    $level = $this->getLevel(trim($data[16]));
                    $superordinateId = null;
                    $superordinateNIK = $this->getSuperOrdinateNIK(trim($data[17]));
    
                    $em->name = $name;
                    $em->email = $email;
                    $em->nik = $nik;
                    $em->level = 1;
                    $em->group_id = 1;
                    $em->position_id = $title;
                    $em->status = $status;
                    $em->business_unit_id = $businessUnitId;
                    $em->org_unit_id = $orgUnitId;
                    $em->location_id = $locationId;
                    $em->join_date = $joinDate;
                    $em->quit_date = $quitDate;
                    $em->contract_start = $contractStart;
                    $em->contract_ended = $contractEnded;
                    $em->title = $data[15];
                    $em->company_id = $companyId;
                    $em->costcenter_id = $costCenterId;
                    $em->pangkat_id = $pangkat;
                    $em->golongan_id = $golongan;
                    $em->superordinate_nik = $superordinateNIK;
                    $em->save();

                    $this->recordActivity('is <strong>uploading Mutation CSV.</strong>');
                    $itemResult = array('NIK: ' . $nik, $name, ' Updated.');
                    array_push($result, $itemResult);                        
                }
                fclose($handle);

                $itemResult = array('New employee(s) successfully uploaded', 'Warning: 0', 'Error: 0');
                array_push($result, $itemResult);                        
            }           
        }

        return redirect('/od/mutasi/mutation')->with('result', $result);        
    }

    // -- end here --


    // Method to handle EMPLOYEE TERMINATION
    // -- Start here --

    public function showTermination() {
        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();
        return view('ods.termination', $data);
    }

    public function downloadTermination() {
        return Storage::download('termination.csv');
    }

    private function isDateValid($date) {
        // test if the date has "/" separator
        $dateArr = explode('/', $date);
        if (!(count($dateArr) == 3)) return false; 

        // test if the date has 4 digit year
        if (strlen($dateArr[2]) != 4) return false;
        
        return true;
    }

    public function uploadTerminationCSV(Request $request) {
        if (!$request->hasFile('terminationcsv')) {
            $this->recordActivity('is <strong>uploading Termination CSV but no file attached.</strong>');
            return redirect('/od/mutasi/termination')->with('error', 'Upload error: No file attached.');
        }

        if (!$request->file('terminationcsv')->isValid()) {
            $this->recordActivity('is <strong>uploading Termination CSV but not a valid file attached.</strong>');
            return redirect('/od/mutasi/termination')->with('error', 'Upload error: not a valid file.');
        }

        $extension = $request->terminationcsv->extension();
        if ($extension != 'csv' && $extension != 'txt') {
            $this->recordActivity('is <strong>uploading Termination CSV but file is not a csv file.</strong>');
            return redirect('/od/mutasi/termination')->with('error', 'Upload error: File is not a csv file.');
        }

        $request->validate([
            'terminationcsv' => 'required|mimes:csv,txt|max:2048',
        ]);

        $isTest = false;
        if ($request->has('btn_test_upload') && $request->btn_test_upload == 'Test File') {
            $this->recordActivity('is <strong>uploading Termination CSV in test mode.</strong>');
            $isTest = true;
        }

        $terminationCsv = $request->terminationcsv;

        $result = array();

        if ($isTest) {
            if (($handle = fopen($terminationCsv, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    $employee = Employee::where('nik', $data[0])->first();
                    if ($employee == NULL) {
                        $itemResult = array($data[0], $data[1], 'Failed. No employee with that NIK.');
                    } else {
                        if (!$this->isDateValid($data[2])) {
                            $itemResult = array($employee->getNIK(), $employee->getName(), 'Failed. Date is in wrong format.');
                        } else {
                            $itemResult = array($employee->getNIK(), $employee->getName(), 'Passed.');
                        }
                    }
    
                    array_push($result, $itemResult);                
                }
            }
        } else {
            if (($handle = fopen($terminationCsv, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    $employee = Employee::where('nik', utf8_decode($data[0]))->first();
                    if ($employee == NULL) {
                        $itemResult = array($data[0], $data[1], 'Failed. No employee with that NIK.');
                    } else {
                        $employee->setTermination($data[2]);
                        $employee->save();
                        $this->recordActivity('is <strong>uploading Termination CSV with status DONE.</strong>');
                        $itemResult = array($employee->getNIK(), $employee->getName(), 'DONE.');
                    }
    
                    array_push($result, $itemResult);                
                }
            }
        }

        return redirect('/od/mutasi/termination')->with('result', $result);
    }
    // -- end here


    public function getUser(Request $request) {
        $emp = Employee::where('nik', $request->nik)->first();
        if($emp) {
            return Response::json(['code' => 200, 'message' => $emp->getName()]);
        } else {
            return Response::json(['code' => 400, 'message' => 'employee not found']);
        }
    }

    public function saveMutasi(Request $request) {
        $oldEmp = Employee::where('nik', $request->nik_resign)->first();
        if($oldEmp) {
            $newEmp = Employee::where('nik', $request->nik_new)->first();
            if($newEmp) {
                $newEmp->superordinate_nik = $oldEmp->superordinate_nik;
                $newEmp->save();

                $oldEmp->superordinate_nik = null;
                $oldEmp->save();

                $this->recordActivity('Mutasi ' . $oldEmp->getName() . '(' . $oldEmp->getNIK() . ') ' .
                    ' To ' . $newEmp->getName() . '(' . $newEmp->getNIK() . ')');
                
                return redirect('od/mutasi')->with('message','Success');
            } else {
                return redirect('od/mutasi')->with('message','New employee not found');
            }
        } else {
            return redirect('od/mutasi')->with('message','Old employee not found');
        }
    }

    public function deleteKPITemplate(Request $request) {
        $template = KpiTemplate::where('id', $request->template_id)->first();
        
        if($template) {
            $result = $template->delete();
            return redirect('od/setting')->with('delete-message','KPI Template success deleted');
        } else {
            return redirect('od/setting')->with('delete-message','KPI Template delete fail!');
        }
    }

    public function uploadFAQ(Request $request) {
        $request->validate([
            'guide_book' => 'required'
        ]);
        $file = $request->file('guide_book');
        $filename = 'guide-book.pdf';
        $request->guide_book->move(public_path('uploads/faq'), $filename);
        $this->recordActivity('is <strong>uploading a new Guide Book.</strong>');
        return Response::json(['code' => 200, 'message' => 'Guide Book Uploaded Success']);
    }

    public function uploadVideoFAQ(Request $request) {
        // $request->validate([
        //     'video' => 'required'
        // ]);
        $file = $request->file('video');
        $filename = 'video.mp4';
        $request->video->move(public_path('uploads/faq'), $filename);
        $this->recordActivity('is <strong>uploading a new Video.</strong>');
        return Response::json(['code' => 200, 'message' => 'Video Uploaded Success']);
    }

    // -- Method for adding new employee start here --
    private function getNIK($nik) {return $nik;}
    
    public function resetPassword($nik, $newpass) {
        $emp = Employee::where('nik', $nik)->first();

        if ($emp != null) {
            $emp->password = Hash::make($newpass);
            $emp->save();
            echo "Changed.";
        } else {
            echo "NIK not found.";
        }
    }
	
	private function getName($name) {return $name;}

	private function getEmployeeStatus($status) {
		if (strcasecmp($status, 'tetap') == 0) {
			return 2;
		}
		return 1;
	}

	private function getLocation($location) {
		$loc = Location::where('name', $location)->first();
		if ($loc != null) return $loc->getId();
		$newloc = new Location;
		$newloc->name = $location;
		$newloc->save();
		return $newloc->id;
	}

	private function getBusinessUnit($bu) {
		$businessUnit = BusinessUnits::where('name', $bu)->first();
		if ($businessUnit != null) return $businessUnit->getId();
		$newBU = new BusinessUnits;
		$newBU->name = $bu;
		$newBU->save();
		return $newBU->id;
	}

	private function getCompany($company) {
		$cmpny = Company::where('name', $company)->first();
		if ($cmpny != null) return $cmpny->getId();
		$newCompany = new Company;
		$newCompany->name = $company;
		$newCompany->save();
		return $newCompany->id;
	}

	private function getJoinDate($joinDate) {
		if (strlen($joinDate) > 0) {
			return DateTime::createFromFormat("d/m/y", $joinDate);
		}
		return null;
	}

	private function getQuitDate($quitDate) {
		if (strlen($quitDate) == 0) {
			return null;
		}
		return DateTime::createFromFormat("d/m/y", $quitDate);
	}

	private function getCostCenter($costCenter) {
		$cc = CostCenter::where('name', $costCenter)->first();
		if ($cc != null) return $cc->getId();
		$newCC = new CostCenter;
		$newCC->name = $costCenter;
		$newCC->save();
		return $newCC->id;
	}

	private function getContractStart($contractStart) {
		if (strlen($contractStart) == 0) {
			return null;
		}
		return DateTime::createFromFormat("d/m/y", $contractStart);
	}

	private function getContractEnded($contractEnded) {
		if (strlen($contractEnded) == 0) {
			return null;
		}
		return DateTime::createFromFormat("d/m/y", $contractEnded);
	}

	private function getEmail($email) {
		return $email;
	}

	private function getPangkat($pangkat) {
		$pkt = Pangkat::where('name', $pangkat)->first();
		if ($pkt != null) return $pkt->getId();
		$newPkt = new Pangkat;
		$newPkt->name = $pangkat;
		$newPkt->save();
		return $newPkt->id;
	}

	private function getGolongan($golongan) {
		$glg = Golongan::where('name', $golongan)->first();
		if ($glg != null) return $glg->getId();
		$newGlg = new Golongan;
		$newGlg->name = $golongan;
		$newGlg->save();
		return $newGlg->id;
	}

	private function getOrgUnit($orgUnit) {
		$div = Division::where('name', $orgUnit)->first();
		if ($div != null) return $div->getId();
		$newDiv = new Division;
		$newDiv->name = $orgUnit;
		$newDiv->save();
		return $newDiv->id;
	}

	private function getPosition($position) {
		$pos = Position::where('name', $position)->first();
		if ($pos != null) return $pos->getId();
		$newPos = new Position;
		$newPos->name = $position;
		$newPos->save();
		return $newPos->id;
	}

	private function getLevel($level) {
		// Empty because it's the same as golongan
	}

	private function getSuperOrdinateNIK($superordinateNIK) {
		return $superordinateNIK;
    }
    
    // -- Method for adding new employee end here

    
}

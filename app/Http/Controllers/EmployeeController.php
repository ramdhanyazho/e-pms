<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Excel;
use App\Bsc;
use App\Faq;
use App\Kpi;
use App\Kra;
use App\Logz;
use Response;
use App\Setting;
use App\Activiti;
use App\Division;
use App\Employee;
use App\Location;
use App\Position;
use App\TodoList;
use App\KPIExport;
use App\Attachment;
use App\KpiHistory;
use App\Departments;
use App\KpiTemplate;
use App\Announcement;
use App\EmployeeKpis;
use App\BusinessUnits;
use App\ReviewSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function __construct() {}
    
    private function getMenuTitle($path) {
        switch (strtolower($path)) {
            case 'em/dashboard':
                return 'Dashboard';
            case 'em/me':
                return 'My Profile';
            case 'em/evaluation':
                return 'My Evaluation';
            case 'em/kpi':
                return 'Personal KPI';
            case 'em/kpi/subordinate':
                return 'Subordinate KPI';
            case 'em/kpi/review':
                return 'Review KPI';
            case 'em/announcement':
                return 'Announcement';
            case 'em/activity':
                return 'Activity';
            case 'em/faq':
                return 'Frequently Asked Questions (FAQ)';
            default:
                return '';
        }
    }

	private function getSidebarData() {
		$authUser = Auth::user();
        $currentPath = request()->path();
        $menuTitle = $this->getMenuTitle($currentPath);
		$employee = $this->getMe();
		return array('auth_user' => $authUser,
            'current_path' => $currentPath,
            'menu_title' => $menuTitle,
			'employee' => $employee);
	}

	private function getContentData() {
		$authUser = Auth::user();
		return array('auth_user' => $authUser);
	}

	public function viewDashboard(Request $request) {
		$data['periods'] = $this->getPeriods();
		$data['business_units'] = $this->getBusinessUnits();
		$data['sidebar'] = $this->getSidebarData();
		$data['content'] = $this->getContentData();

		$me = $this->getMe();
		$data['tasks_count'] = count($me->getTasks());
		$data['tasks'] = $me->getTasks();
		$data['kpi_completed'] = $me->getSubordinateKPICompleted();
		$data['kpi_on_progress'] = $me->getSubordinateKPIProgress();
		$data['kpi_unprocessed'] = $me->getSubordinateKPIUnprocessed();
		return view('employees.dashboard', $data);
	}

	public function viewMyProfile(Request $request) {
		$data['sidebar'] = $this->getSidebarData();
		$data['content'] = $this->getContentData();
		$data['me'] = $this->getMe();
		$data['super_ordinate'] = $data['me']->getSuperOrdinate();
		$data['subordinate'] = $data['me']->getSubordinate();
		return view('employees.me', $data);
	}

	public function viewProfileId($id) {
		$data['sidebar'] = $this->getSidebarData();
		$data['content'] = $this->getContentData();
		$data['employee'] = Employee::find($id);
		return view('employees.profilebyid', $data);
	}

	public function viewEvaluation(Request $request) {
		$data['sidebar'] = $this->getSidebarData();
		$data['content'] = $this->getContentData();
		$data['me'] = $this->getMe();
        $data['super_ordinate'] = $data['me']->getSuperOrdinate();
        $data['subordinate'] = $data['me']->getSubordinate();
        $data['kpis'] = EmployeeKpis::where('employee_id', Auth::user()->id)
        						->where('year', date('Y'))
        						->get();
		return view('employees.evaluation', $data);
	}

    public function viewEvaluationByYear($year) {
        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();
        $data['me'] = $this->getMe();
        $data['super_ordinate'] = $data['me']->getSuperOrdinate();
        $data['subordinate'] = $data['me']->getSubordinate();
        $data['chosen_year'] = $year;
        $data['kpis'] = EmployeeKpis::where('employee_id', Auth::user()->id)
                                ->where('year', $year)
                                ->get();
        return view('employees.evaluation', $data);        
    }

	public function viewKPIIndex(Request $request) {
		$data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();
        $me = $this->getMe();
		$data['me'] = $me;
        $data['kpis'] = EmployeeKpis::where('employee_id', Auth::user()->id)
        					->where('year', date('Y'))
        					->get();

        $kpiTrack = array();
        foreach($data['kpis'] as $kpi) {
            $histories = $kpi->getHistory;
            foreach ($histories as $history ) {
                $kpiTrack[$history->employee_kpis_id]['title'] = $kpi->kpiTemplate->kpi->getName();
                $kpiTrack[$history->employee_kpis_id]['actual'][$history->month] = $history->actual;
            }
        }

        $data['kpi_track'] = $kpiTrack;
        $data['is_having_superordinate'] = $me->isHavingSuperordinate();

		return view('employees.kpiindex', $data);
	}

	public function viewKPIIndexSubordinate(Request $request) {
		$data['sidebar'] = $this->getSidebarData();
		$data['content'] = $this->getContentData();
        $data['subordinates'] = Employee::where('superordinate_nik', $this->getMe()->getNIK())
                                ->where('status', '<>', 9)
                                ->orderBy('name', 'ASC')->get();
        $data['bscs'] = Bsc::orderBy('name', 'ASC')->get();
        $data['locations'] = Location::orderBy('name', 'ASC')->get();
        $data['business_units'] = BusinessUnits::orderBy('name', 'ASC')->get();
        $data['divisions'] = Division::orderBy('name', 'ASC')->get();
        $data['departments'] = Departments::orderBy('name', 'ASC')->get();
        $data['kras'] = Kra::orderBy('name', 'ASC')->get();
        $data['positions'] = Position::orderBy('name', 'ASC')->get();

        $data['is_having_superordinate'] = $this->getMe()->isHavingSuperordinate();
        $data['is_having_subordinate'] = $this->getMe()->isHavingSubordinate();
		return view('employees.kpiindexsub', $data);
	}
	
	public function viewKPIIndexReview(Request $request) {
		$me = $this->getMe();
		$data['sidebar'] = $this->getSidebarData();
		$data['content'] = $this->getContentData();
        $data['me'] = $me;
        $data['my_schedules'] = $me->getScheduleSchedule();
        $data['my_waiting_approvals'] = $me->getScheduleApproval();
        $data['my_completed_review'] = $me->getScheduleComplete();

        $data['is_having_superordinate'] = $me->isHavingSuperordinate();
        
        // TODO: View below is not effective and tends to have an infinite loop
        // FIX IT!
		return view('employees.kpiindexrev', $data);
	}

	public function viewAnnouncement(Request $request) {
		$data['sidebar'] = $this->getSidebarData();
		$data['content'] = $this->getContentData();
		$me = $this->getMe();
        $data['keyword'] = $request->input('q');
		$data['announcements'] = (new Announcement())->getList($me->getId(), $me->getGroupId(), $request->input('q'));
		return view('employees.announcement', $data);
	}

	public function viewActivity(Request $request) {
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
        $data['users'] = $this->getMe()->getSubordinate();

        $me = $this->getMe();
        $data['me'] = $me;
		$data['actions'] = Logz::select('page')
                                ->where('type', 'act')
                                ->where('user_id', $me->getId())
                                ->groupBy('page')
                                ->get();
        $data['filter'] = $request->all();
        $qryFilter = array();
        $qryFilter += ['user_id' => $me->getId()];

        if($startDate != null) {
            $activities = Activiti::where($qryFilter)
                                    ->whereDate('created_at', '>=', $startDate)
                                    ->whereDate('created_at', '<=', $endDate)
                                    ->orderBy('created_at','desc')
                                    ->paginate(config('app.items_per_page'));
        } else {
            $activities = Activiti::where($qryFilter)
                                    ->orderBy('created_at','desc')
                                    ->paginate(config('app.items_per_page'));
        }

        $data['activities'] = $activities;
		return view('employees.activity', $data);
	}

	public function viewFAQ(Request $request) {
		$data['sidebar'] = $this->getSidebarData();
		$data['content'] = $this->getContentData();

        $data['faqs'] = Faq::orderBy('updated_at', 'DESC')->get();
		return view('employees.faq', $data);
	}

    public function viewSetting(Request $request) {
		$data['sidebar'] = $this->getSidebarData();
		$data['content'] = $this->getContentData();
        return view('employees.setting', $data);
    }

    public function addKPIIndexSubordinate(Request $request) {
        $request->validate([
            'employee_id' => 'required',
            'year' => 'required',
            'weight' => 'required',
            'target' => 'required',
            'kpi_id' => 'required'
        ]);
        
        if(Setting::isDeadline()) return Response::json(['code' => 400, 'message' => 'Sudah Deadline']);
        //check weight first
        if(!EmployeeKpis::isValidWeight($request->employee_id, $request->year, $request->weight, $currentWeight)) {
            return Response::json(['code' => 400, 'message' => 'Total Weight no more than 100, current Weight = ' . $currentWeight]);
        }

        $data = array(
                'employee_id'   => $request->employee_id,
                'year'          => $request->year,
                'kpi_templates_id' => $request->kpi_id,
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

        $employee = Employee::find($request->employee_id);
        $kpiTemplate = KpiTemplate::find($request->kpi_id);
        $this->recordActivity('is adding KPI to subordinate:<br>
                Employee: <strong>' . $employee->getName() . ' - ' . $employee->getNIK() . '</strong><br>
                Year: <strong>' . $request->year . '</strong><br>
                KPI: <strong>' . $kpiTemplate->kpi->getName() . '</strong><br>
                Weight: <strong>' . $request->weight . '%</strong><br>
                Target: <strong>' . $request->target . '</strong><br>
                Indicators: <br>
                [1]: <strong>' . $request->indicator1 . '</strong><br>
                [2]: <strong>' . $request->indicator2 . '</strong><br>
                [3]: <strong>' . $request->indicator3 . '</strong><br>
                [4]: <strong>' . $request->indicator4 . '</strong><br>
                [5]: <strong>' . $request->indicator5 . '</strong><br>');

        return Response::json(['code' => 200, 'message' => 'input success']);
    }
    
    public function addKPIIndexSubordinateScore(Request $request) {
        $update = EmployeeKpis::where('id', $request->input('kpi_id'))
                                ->update(['actual' => $request->input('score')]);

        $data = array(
            'employee_kpis_id'   => $request->kpi_id,
            'year'          => $request->year,
            'month'        => $request->month,
            'actual'        => $request->score
        );

        KpiHistory::create($data);

        $employeeKpi = EmployeeKpis::find($request->kpi_id);
        $this->recordActivity('is giving score to subordinate:<br>
                Employee: <strong>' . $employeeKpi->employee->getName() . '</strong><br>
                KPI: <strong>' . $employeeKpi->kpiTemplate->kpi->getName() . '</strong><br>
                Month: <strong>' . $this->intToMonth(intval($request->month)) . '</strong><br>
                Year: <strong>' . $request->year . '</strong><br>
                Score: <strong>' . $request->score . '</strong>');
        return Response::json(['code' => 200, 'message' => 'input success']);
    }

    public function addKPIIndexSelfScore(Request $request) {
        $update = EmployeeKpis::where('id', $request->input('kpi_id'))
                                ->update(['self_actual' => $request->input('score')]);

        $data = array(
            'employee_kpis_id'   => $request->kpi_id,
            'year'          => $request->year,
            'month'        => $request->month,
            'actual'        => 0,
            'self_actual'        => $request->score
        );

        KpiHistory::create($data);
        
        $kpi = EmployeeKpis::find($request->kpi_id);
        $this->recordActivity('is <strong>inputing self appraisal</strong>
            for KPI <strong>' . $kpi->kpiTemplate->kpi->getName() . '</strong>
            on <strong>' . $this->intToMonth(intval($request->month)) . '</strong> with score
            <strong>' . $request->score . '</strong>');

        return Response::json(['code' => 200, 'message' => 'input success']);
    }

    public function uploadPhoto(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg|max:2048',
        ]);

        $imageName = Auth::user()->id . '.jpg';

        $request->image->move(public_path('images'), $imageName);
        $this->recordActivity('is <strong>uploading a new profile photo.</strong>');
        return Response::json(['code' => 200, 'message' => 'Image Uploaded Success']);
    }

    public function ajaxGetPositionByLocation(Request $request) {
        $locationId = $request->get('loc_id');
        $data = [];
        $positions = Employee::select('position_id')
                            ->distinct()
                            ->where('location_id', $locationId)
                            ->get();

        if (count($positions) > 0) {
            foreach ($positions as $pos) {
                $thePos = Position::findOrFail($pos->position_id);
                $data[] = ['id' => $thePos->getId(), 'name' => $thePos->getName()];
            }
    
            $positionName = array_column($data, 'name');
            array_multisort($positionName, SORT_ASC, $data);    
        }

        $result = ['status' => 200, 'data' => $data];
        return $result;
    }


    public function ajaxGetKpisByBscAndPosition(Request $request) {
        $arr = [];
        $kpis = KpiTemplate::select('id','kpi_id')
                ->where('bsc_id', $request->input('bsc_id'))
                ->where(function($q) use ($request) {
                        $q->where('position_id', $request->input('position_id'))
                          ->orWhere('position_id', -1);
                    })
                ->get();
        foreach ($kpis as $kpi) {
            $arr[] = [ 'id' => $kpi->id, 'name' => $kpi->kpi->getName()]; 
        }
        return $arr; 
    }

    public function ajaxGetKpisByBscOnly(Request $request) {
        $arr = [];
        $kpis = KpiTemplate::select('id','kpi_id', 'position_id')
                ->where('bsc_id', $request->input('bsc_id'))
                ->get();
        
        foreach ($kpis as $kpi) {
            $arr[] = [ 'id' => $kpi->id, 'name' => $kpi->kpi->getName()]; 
        }
        return $arr; 
    }

    public function actionChangePassword(Request $request) {
        $validatedData = $request->validate([
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'min:6'
        ]);

        $emp = Employee::find($this->getMe()->getId());
        
        if($emp) {
            $emp->password = Hash::make($request->password);
            $emp->save();
            return redirect('em/setting')->with('message', 'Password berhasil diubah');
        } else {
            return redirect('em/setting')->with('message', 'Error');
        }
    }

    public function updateKPI(Request $request, $id) {

        $request->validate([
            'employee_id' => 'required',
            'year' => 'required',
            'weight' => 'required',
            'target' => 'required',
            'kpi_id' => 'required'
        ]);

        $oldWeight = 0;
        if (isset($request->old_weight)) {
            $oldWeight = $request->old_weight;
        }
        $weightAdd = $request->weight - $oldWeight;

        if(!EmployeeKpis::isValidWeight($request->employee_id, $request->year, $weightAdd, $currentWeight)) {
            return Response::json(['code' => 400, 'message' => 'Total Weight no more than 100, current Weight = ' . $currentWeight]);
        }
        
        $update = array(
                'year'          => $request->year,
                'kpi_templates_id'        => $request->kpi_id,
                'weight'        => $request->weight,
                'target'        => $request->target,
                'indicators'    => json_encode([ 
                    "indicator1" => $request->indicator1, 
                    "indicator2" => $request->indicator2, 
                    "indicator3" => $request->indicator3, 
                    "indicator4" => $request->indicator4, 
                    "indicator5" => $request->indicator5])
            );
        $update = EmployeeKpis::where('id', $id)
                                ->update($update);

        $employeeKpi = EmployeeKpis::find($id);
        $this->recordActivity('is <strong>updating</strong> KPI to subordinate:<br>
                Employee: <strong>' . $employeeKpi->employee->getName() . ' - ' . $employeeKpi->employee->getNIK() . '</strong><br>
                Year: <strong>' . $request->year . '</strong><br>
                KPI: <strong>' . $employeeKpi->kpiTemplate->kpi->getName() . '</strong><br>
                Weight: <strong>' . $request->weight . '%</strong><br>
                Target: <strong>' . $request->target . '</strong><br>
                Indicators: <br>
                [1]: <strong>' . $request->indicator1 . '</strong><br>
                [2]: <strong>' . $request->indicator2 . '</strong><br>
                [3]: <strong>' . $request->indicator3 . '</strong><br>
                [4]: <strong>' . $request->indicator4 . '</strong><br>
                [5]: <strong>' . $request->indicator5 . '</strong><br>');

        return Response::json(['code' => 200, 'message' => 'input success']);
    }

    public function addSchedule(Request $request) {
        $data = array(
                'year'          => $request->year,
                'scheduler_id'  => $request->scheduler_id,
                'scheduled_id'  => $request->scheduled_id,
				'month'         => $request->month,
				'date'			=> $request->date,
                'is_scheduled'  => false
            );
        $update = ReviewSchedule::create($data);

        return Response::json(['code' => 200, 'message' => 'input success']);
    }

    public function removeSchedule(Request $request) {
        $scheduleId = $request->schedule_id;
        $rs = ReviewSchedule::find($scheduleId);

        if ($rs == null) {
            return Response::json(['code' => 404, 'message', 'Schedule not found.']);
        }

        $rs->delete();
        return Response::json(['code' => 200, 'message' => 'Schedule is deleted.']);
    }

    public function addNewKPI(Request $request) {
        $dataKPI = array(
            'name'  => $request->kpi
        );

        $kpi = Kpi::create($dataKPI);

        $dataKPITemplate = array(
            'location_id'  => $request->location_id,
            'business_unit_id'  => 0,
            'division_id'  => 0,
            'department_id'  => 0,
            'bsc_id'  => $request->bsc_id,
            'kra_id'  => 0,
            'kpi_id'  => $kpi->id,
            'position_id'  => $request->position_id,
            'is_protected' => false
        );

        $update = KpiTemplate::create($dataKPITemplate);

        return Response::json(['code' => 200, 'message' => 'input success']);
    }

    public function ajaxGetKpisByUser(Request $request) {
        $arr = [];
        $kpis = EmployeeKpis::where('year', $request->year)
                ->where('employee_id', $request->employee_id)
                ->get();
        foreach ($kpis as $kpi) {
            $arr[] = [ 'id' => $kpi->id, 'name' => $kpi->kpiTemplate->kpi->getName()]; 
        }
        return $arr;
    }

    public function ajaxGetTrackKPI(Request $request, $employeeId) {
        $employee = Employee::findOrFail($employeeId);
        $kpis = EmployeeKpis::where('employee_id', $employeeId)
                    ->where('year', date('Y'))
                    ->get();

        $kpiTrack = array();
        foreach($kpis as $kpi) {
            $histories = $kpi->getHistory;
            foreach ($histories as $history) {
                $kpiTrack[$history->employee_kpis_id]['title'] = $kpi->kpiTemplate->kpi->getName();
                $kpiTrack[$history->employee_kpis_id]['actual'][$history->month] = $history->actual;
            }
        }

        return Response::json(['code' => 200, 'name' => $employee->getName(), 'data' => $kpiTrack]);
    }

    public function addScheduleReview(Request $request) {
        $filename = null;

        if ($request->upload_file) {
            foreach ($request->upload_file as $file) {
                $filename = md5(time()) . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/', $filename);
            }
        }

        $dataKPI = array(
            'scheduled_contents'  => json_encode($request->review),
            'scheduled_date' => date('Y-m-d H:i:s'),
            'is_scheduled'  => true
        );

        $kpi = ReviewSchedule::where('id', $request->schedule_id)
                ->update($dataKPI);

        $attchment = Attachment::create([
            'title' => '',
            'filepath' => $filename,
            'schedule_id' => $request->schedule_id
        ]);
        // return Response::json(['code' => 200, 'message' => 'input success']);

        $sch = ReviewSchedule::find($request->schedule_id);
        if($sch) {
            TodoList::create([
                'user_id' => $sch->scheduled_id, 
                'creator' => $sch->scheduler_id,
                'todo' => '<a href="/em/kpi/review">KPI Review from ' . Employee::find($sch->scheduler_id)->getName() . '</a>',
                'is_done' => 0 
            ]);
        }
        
        return redirect('em/kpi/review');

    }

    public function addScheduleApproval(Request $request) {
        $filename = null;
        $contentApproval = null;
        if (isset($request->review) && $request->review != null) {
            $contentApproval = json_encode($request->review);
        }
        
        $dataKPI = array(
            'is_approval_scheduled' => $request->is_approval_scheduled,
            'is_approval_scheduler' => $request->is_approval_scheduler,
            'approval_scheduler_date'  => date('Y-m-d H:i:s'),
            'approval_scheduled_date'  => date('Y-m-d H:i:s'),
        );

        if($contentApproval != null) {
            $dataKPI['approval_contents'] = $contentApproval;
        }

        $kpi = ReviewSchedule::where('id', $request->schedule_id)
                    ->update($dataKPI);

        if ($request->upload_file) {
            foreach ($request->upload_file as $file) {
                $filename = md5(time()) . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/', $filename); 

                $attchment = Attachment::create([
                    'title' => '',
                    'filepath' => $filename,
                    'schedule_id' => $request->schedule_id
                ]);
            }
        }
        
        return redirect('em/kpi/review');

    }

    public function printEvaluation(Request $request) {
        $data['content'] = $this->getContentData();
        $data['me'] = $this->getMe();
        $data['super_ordinate'] = $data['me']->getSuperOrdinate();
        $data['subordinate'] = $data['me']->getSubordinate();
        $data['kpis'] = EmployeeKpis::where('employee_id', Auth::user()->id)
                                ->where('year', date('Y'))
                                ->get();
        return view('prints.evaluation', $data);
    }

    public function deleteKPI($id) {
        $employeeKpi = EmployeeKpis::find($id);
        $this->recordActivity('is <strong>DELETING</strong> KPI for subordinate:<br>
                Employee: <strong>' . $employeeKpi->employee->getName() . ' - ' . $employeeKpi->employee->getNIK() . '</strong><br>
                KPI: <strong>' . $employeeKpi->kpiTemplate->kpi->getName() . '</strong><br>
                Year: <strong>' . $employeeKpi->getYears() . '</strong><br>
                Weight: <strong>' . $employeeKpi->getWeight() . '</strong><br>
                Target: <strong>' . $employeeKpi->getTarget() . '</strong>');

        EmployeeKpis::where('id', $id)->delete();

        return redirect('em/kpi/subordinate');
    }

    public function getSelfAppraisal(Request $request) {
        $kpi = KpiHistory::where('employee_kpis_id', $request->id)
            ->where('month', $request->month)
            ->where('year', $request->year)
            ->orderBy('created_at', 'desc')
            ->first();
        if($kpi) {
            return Response::json(['status' => 200, 'message' => $kpi->self_actual]);
        } else {
            return Response::json(['status' => 404, 'message' => 'data not found']);
        }
	}
	
	public function getIndicatorsText(Request $request) {
		$indicators = EmployeeKpis::findOrFail($request->emp_kpi_id);
		return Response::json(['status' => 200, 'message' => $indicators->getIndicators()]);
	}

    public function getTotalWeight(Request $request) {
        $year = $request->year;
        $employeeId= $request->employee_id;
        $totalWeight = EmployeeKpis::select('weight')
                ->where('employee_id', $employeeId)
                ->where('year', $year)
                ->sum('weight');
        return Response::json(['status' => 200, 'message' => $totalWeight]);
    }

    public function actionDownload($year) {
        $user = Employee::where('id', Auth::user()->id)->first();
        return Excel::download(new KPIExport($user, $year), 'kpi.xlsx');
    }

    public function viewOnly(){
        $data = [ 'user' => Employee::where('id', Auth::user()->id)->first(),
            'kpis' => EmployeeKpis::all(),
            'totalWeight' => 0,
            'totalScore' => 0
        ];
        return view('downloads.kpi', $data);

    }

    public function viewSubordinateCustom() {
        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();
        $data['me'] = $this->getMe();
        $data['super_ordinate'] = $data['me']->getSuperOrdinate();
        $data['subordinates'] = $data['me']->getSubordinate();
        $data['bscs'] = Bsc::orderBy('name', 'ASC')->get();
        return view('employees.kpicustom', $data);
    }

    public function viewSubordinateUploadResult() {
        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();
        $data['me'] = $this->getMe();
        $data['super_ordinate'] = $data['me']->getSuperOrdinate();
        $data['subordinate'] = $data['me']->getSubordinate();
        $data['kpis'] = EmployeeKpis::where('employee_id', Auth::user()->id)
                                ->where('year', date('Y'))
                                ->get();
                                $kpiTrack = array();
        foreach($data['kpis'] as $kpi) {
            $histories = $kpi->getHistory;
            foreach ($histories as $history ) {
                $kpiTrack[$history->employee_kpis_id]['title'] = $kpi->kpiTemplate->kpi->getName();
                $kpiTrack[$history->employee_kpis_id]['actual'][$history->month] = $history->actual;
            }
        }

        $data['kpi_track'] = $kpiTrack;
        return view('employees.kpiuploadresult', $data);
    }

    public function viewSubordinateUploadKPI() {
        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();
        return view('employees.subordinate_uploadkpi', $data);
    }

    public function downloadSubordinateUploadKPI() {
        return Storage::download('upload_employee_kpi.csv');
    }

    public function viewSubordinateUploadAchievement() {
        $data['sidebar'] = $this->getSidebarData();
        $data['content'] = $this->getContentData();
        return view('employees.subordinate_upload_achievement', $data);
    }

    public function downloadSubordinateUploadAchievement() {
        return Storage::download('upload_achievement.csv');
    }

    public function saveSubordinateCustom(Request $request) {
        $result = '';
        $noError = true;
        $kpiTemplateId = KpiTemplate::where('id', $request->kpi_id)->first();
        if ($kpiTemplateId == null) return Response::json(['code' => 400, 'message' => 'KPI Template not found!']);
        
        if($request->employee_id) {
            foreach ($request->employee_id as $employee_id) {
                $employee = Employee::find($employee_id);
                if($employee) {
                    if(!EmployeeKpis::isValidWeight($employee_id, $request->year, $request->weight, $currentWeight)) {
                        $result .= 'Total Weight no more than 100, current Weight for \'' . $employee->getName() .'\' is ' . $currentWeight . "\n";
                        $noError = false;
                    } else {

                        $data = array(
                                'employee_id'       => $employee_id,
                                'year'              => $request->year,
                                'kpi_templates_id'  => $kpiTemplateId->getId(),
                                'weight'            => $request->weight,
                                'target'            => $request->target,
                                'indicators'        => json_encode([ 
                                    "indicator1"    => $request->indicator1, 
                                    "indicator2"    => $request->indicator2, 
                                    "indicator3"    => $request->indicator3, 
                                    "indicator4"    => $request->indicator4, 
                                    "indicator5"    => $request->indicator5]),
                                'actual'            => 0,
                            );
                        EmployeeKpis::create($data);
                        $result .= 'Add KPI to \'' . $employee->getName() ."' is success \n";


                    }
                } else {
                    $noError = false;
                    $result .= 'Employee Not Found with Id : ' . $employee_id;
                }
                
            }
        } else {
            $result .= 'No Employee Selected';
            $noError = false;
        }

        if($noError) {
            return Response::json(['code' => 200, 'message' => $result]);
        } else {
            return Response::json(['code' => 400, 'message' => $result]);
        }

    }

    public function saveSubordinateKpiUpload(Request $request) {
        if (!$request->hasFile('employeekpicsv')) {
            $this->recordActivity('is <strong>uploading employee KPI CSV but no file attached.</strong>');
            return redirect('/em/kpi/subordinate/upload/kpi')->with('error', 'Upload error: No file attached.');
        }

        if (!$request->file('employeekpicsv')->isValid()) {
            $this->recordActivity('is <strong>uploading employee KPI CSV but not a valid file attached.</strong>');
            return redirect('em/kpi/subordinate/upload/kpi')->with('error', 'Upload error: not a valid file.');
        }

        $extension = $request->employeekpicsv->extension();
        if ($extension != 'csv' && $extension != 'txt') {
            $this->recordActivity('is <strong>uploading employee KPI CSV but file is not a csv file.</strong>');
            return redirect('em/kpi/subordinate/upload/kpi')->with('error', 'Upload error: File is not a csv file.');
        }

        $request->validate([
            'employeekpicsv' => 'required|mimes:csv,txt|max:2048',
        ]);

        $isTest = false;
        if ($request->has('btn_test_upload') && $request->btn_test_upload == 'Test File') {
            $this->recordActivity('is <strong>uploading employee KPI CSV in test mode.</strong>');
            $isTest = true;
        }

        $employeeKpiCsv = $request->employeekpicsv;

        $result = array();

        if ($isTest) {
            if (($handle = fopen($employeeKpiCsv, "r")) !== FALSE) {
                $counter = 0;
                $itemResult = array_push($result, array('Row', 'Item', 'Description'));

                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    $counter++;
                    if ($data[0] == 'NIK') continue;

                    // check nik
                    $employee = Employee::where('nik', $data[0])->first();
                    if ($employee == NULL) {
                        $itemResult = array_push($result, array($counter, $data[0], 'Failed. No employee with that NIK.'));
                    }

                    // check BSC
                    $bsc = Bsc::where('name', trim($data[1]))->first();
                    if ($bsc == NULL) {
                        $itemResult = array_push($result, array($counter, $data[1], 'Warning: No BSC with that name. Will create a new BSC.'));
                    }

                    // check KPI
                    $kpi = Kpi::where('name', trim($data[2]))->first();
                    if ($kpi == NULL) {
                        $itemResult = array_push($result, array($counter, $data[2], 'Warning: No KPI with that name. Will create a new KPI.'));
                    }

                    // check tahun: 4 digits and must be more or equal than this year
                    $year = $data[3];
                    if (strlen($year) != 4) {
                        $itemResult = array_push($result, array($counter, $data[3], 'Invalid year'));
                    } else {
                        $currentYear = date('Y');
                        if (intval($year) < $currentYear) {
                            $itemResult = array_push($result, array($counter, $data[3], 'Cannot process year in the past.'));
                        }
                    }

                    // check target
                    $target = $data[4];
                    if (strlen($target) > 499) {
                        $itemResult = array_push($result, array($counter, $data[4], 'Target too long. Target should be less than 500 characters.'));
                    }
                    
                    // check weight
                    $weight = intval($data[5]);
                    if ($weight < 0 || $weight > 100) {
                        $itemResult = array_push($result, array($counter, $data[5], 'Invalid weight. Weight should be between 0 and 100'));
                    }
                }
            }

            if (count($result) == 1) {
                array_push($result, array('Passed', 'Passed', 'Passed'));
            }

            return redirect('em/kpi/subordinate/upload/kpi')->with('result', $result);
        }        

        $result = '';
        $error = false;
        $employeeKpiCsv = $request->employeekpicsv;

        if (($handle = fopen($employeeKpiCsv, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $nik = strtolower(trim($data[0]));

                if ($nik == 'nik') {
                    continue;
                }

                $nik = trim($data[0]);
                if($this->isNIKExist($nik)) {
                    $employee = Employee::where('nik', $nik)->first();
                    $bsc = $this->getBSC(trim($data[1]));
                    $kpi = $this->getKPI(trim($data[2]));
                    $positionId = $this->getPositionId($nik);
                    $kpiTemplateId = $this->getKpiTemplateId($bsc, $kpi, $positionId);
                    if($kpiTemplateId == 0) {
                        $kpiTemplate = new KpiTemplate;
                        $kpiTemplate->location_id = 1;
                        $kpiTemplate->business_unit_id = 1;
                        $kpiTemplate->division_id = 1;
                        $kpiTemplate->department_id = 1;
                        $kpiTemplate->is_protected = false;
                        $kpiTemplate->bsc_id = $bsc;
                        $kpiTemplate->kra_id = 1;
                        $kpiTemplate->kpi_id = $kpi;
                        $kpiTemplate->position_id = $employee->getPositionId();
                        $kpiTemplate->save();

                        $kpiTemplateId = $kpiTemplate->id;
                    }

                    $emId = $this->getIdFromNIK($nik);
                    $year = trim($data[3]);
                    $weight = trim($data[5]);
                    $target = trim($data[4]);
                    $indicator1 = trim($data[6]);
                    $indicator2 = trim($data[7]);
                    $indicator3 = trim($data[8]);
                    $indicator4 = trim($data[9]);
                    $indicator5 = trim($data[10]);

                    $indicators = json_encode([ 
                        "indicator1" => $indicator1, 
                        "indicator2" => $indicator2, 
                        "indicator3" => $indicator3, 
                        "indicator4" => $indicator4, 
                        "indicator5" => $indicator5]);

                    $currentWeight = EmployeeKpis::select('weight')
                        ->where('employee_id', $emId)
                        ->where('year', $year)
                        ->sum('weight');

                    if($currentWeight + $weight > 100) {
                        $result .= 'NIK \'' . $nik . '\' current weight ' . $currentWeight . '<br>';
                        $result .= 'Want to add ' . $weight . ' >> failed (no more than 100)<br><br>';
                        $error = true;
                        continue;
                    } 

                    $emKpi = new EmployeeKpis;
                    $emKpi->employee_id = $emId;
                    $emKpi->year = $year;
                    $emKpi->kpi_templates_id = $kpiTemplateId;
                    $emKpi->weight = $weight;
                    $emKpi->target = $target;
                    $emKpi->indicators = $indicators;
                    $emKpi->actual = 0;
                    $emKpi->save();
                    // } else {
                    //     $error = true;
                    //     $result .= 'KPI Template Not Found  <br>'.
                    //                '==> BSC : [' .$bsc . ']' . $data[2] .'<br>' .
                    //                '==> KPI : [' .$kpi . ']' . $data[3] .'<br><br>' ;
                    // }
                } else {
                    $error = true;
                    $result .= 'NIK \'' . $nik . '\' Not Found <br><br>';
                }
            }
            if($error == false) {
                $result = 'Upload Employee KPIs Success';
            } else {
                $result = '=== Some Error found ===<br><br><br>' . $result;
            }
        }
        return redirect('em/kpi/subordinate/upload/kpi')->with('message', $result);        

    }

    public function saveSubordinateAchievementUpload(Request $request) {
        if (!$request->hasFile('achievementcsv')) {
            $this->recordActivity('is <strong>uploading achievement CSV but no file attached.</strong>');
            return redirect('/em/kpi/subordinate/upload/achievement')->with('error', 'Upload error: No file attached.');
        }

        if (!$request->file('achievementcsv')->isValid()) {
            $this->recordActivity('is <strong>uploading achievement CSV but not a valid file attached.</strong>');
            return redirect('em/kpi/subordinate/upload/achievement')->with('error', 'Upload error: not a valid file.');
        }

        $extension = $request->achievementcsv->extension();
        if ($extension != 'csv' && $extension != 'txt') {
            $this->recordActivity('is <strong>uploading achievement CSV but file is not a csv file.</strong>');
            return redirect('em/kpi/subordinate/upload/achievement')->with('error', 'Upload error: File is not a csv file.');
        }

        $request->validate([
            'achievementcsv' => 'required|mimes:csv,txt|max:2048',
        ]);

        $isTest = false;
        if ($request->has('btn_test_upload') && $request->btn_test_upload == 'Test File') {
            $this->recordActivity('is <strong>uploading achievement CSV in test mode.</strong>');
            $isTest = true;
        }

        $achievementCsv = $request->achievementcsv;

        $result = array();

        if ($isTest) {
            if (($handle = fopen($achievementCsv, "r")) !== FALSE) {
                $counter = 0;
                $itemResult = array_push($result, array('Row', 'Item', 'Description'));

                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    $counter++;
                    // check first row, is it a title and not a NIK? If yes, then skip to the next line
                    if (trim($data[0]) == 'NIK') continue;

                    // check nik
                    if (!$this->isNIKExist(trim($data[0]))) {
                        Log::info('is NIK Exist: "' . $data[0] . '"');
                        $itemResult = array_push($result, array($counter, $data[0], 'Failed. No employee with that NIK.'));
                    }

                    $employee = Employee::where('nik', trim($data[0]))->first();
                    if ($employee == NULL) {
                        Log::info('NIK: "' . $data[0] . '"');
                        $itemResult = array_push($result, array($counter, $data[0], 'Failed. No employee with that NIK.'));
                    }

                    // check BSC
                    $bsc = Bsc::where('name', trim($data[1]))->first();
                    if ($bsc == NULL) {
                        $itemResult = array_push($result, array($counter, $data[1], 'Failed. No BSC with that name.'));
                    }

                    // check KPI
                    $kpiQueryStr = str_replace(' ', '%', trim($data[2]));
                    $kpi = Kpi::where('name', 'ILIKE', $kpiQueryStr)->first();
                    if ($kpi == NULL) {
                        $itemResult = array_push($result, array($counter, $data[2], 'Failed. No KPI with that name.'));
                    }

                    // check bulan: valid month should be between 1 and 12
                    $month = intval($data[3]);
                    if ($month < 1 || $month > 12) {
                        $itemResult = array_push($result, array($counter, $data[3], 'Invalid month.'));
                    }

                    // check tahun: 4 digits and must be more or equal than this year
                    $year = $data[4];
                    if (strlen($year) != 4) {
                        $itemResult = array_push($result, array($counter, $data[4], 'Invalid year'));
                    } else {
                        $currentYear = date('Y');
                        if (intval($year) < $currentYear) {
                            $itemResult = array_push($result, array($counter, $data[4], 'Cannot process year in the past.'));
                        }
                    }

                    // check weight
                    // $weight = intval($data[5]);
                    // if ($weight < 0 || $weight > 100) {
                    //     $itemResult = array_push($result, array($counter, $data[5], 'Invalid weight. Weight should be between 0 and 100'));
                    // }

                    // check target
                    // $target = $data[6];
                    // if (!is_numeric($target)) {
                    //     $itemResult = array_push($result, array($counter, $data[6], 'Invalid target. Target should be numeric.'));
                    // }

                    // check score/achievement
                    $score = $data[5];
                    if (!is_numeric($score)) {
                        $itemResult = array_push($result, array($counter, $data[5], 'Invalid score. Score should be numeric.'));
                    } else {
                        $score = intval($score);
                        if ($score < 0 || $score > 5) {
                            $itemResult = array_push($result, array($counter, $data[5], 'Invalid score. Score should be between 0 - 5'));
                        }
                    }
                }
            }

            if (count($result) == 1) {
                array_push($result, array('Passed', 'Passed', 'Passed'));
            }

            return redirect('em/kpi/subordinate/upload/achievement')->with('result', $result);
        }


        $result = '';
        $error = false;
        $achievementCsv = $request->achievementcsv;

        if (($handle = fopen($achievementCsv, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $nik = strtolower(trim($data[0]));
                Log::info('NIK:' . $nik);

                if ($nik == 'nik karyawan' || $nik == 'nik') {
                    Log::info('Masuk sini');
                    continue;
                }

                $nik = trim($data[0]);
                if($this->isNIKExist($nik)) {
                    $bsc = $this->getBSC(trim($data[1]));
                    $kpi = $this->getKPI(trim($data[2]));
                    $positionId = $this->getPositionId($nik);
                    $kpiTemplateId = $this->getKpiTemplateId($bsc, $kpi, $positionId);
                    if($kpiTemplateId != 0) {
                        $month = trim($data[3]);
                        $year = trim($data[4]);
                        $score = trim($data[5]);

                        $emId = $this->getIdFromNIK($nik);
                        Log::info('Employee ID: ' . $emId);
                        Log::info('KPI Template ID: ' . $kpiTemplateId);
                        $employeeKpi = EmployeeKpis::where('employee_id', $emId)
                                            ->where('kpi_templates_id', $kpiTemplateId)
                                            ->first();

                        $employeeKpi->actual = $score;
                        $employeeKpi->save();
                    
                        $kpiHistory = KpiHistory::where('employee_kpis_id', $employeeKpi->getId())
                                        ->where('month', $month)
                                        ->where('year', $year)
                                        ->first();

                        if ($kpiHistory == null) {
                            $kpiHistory = new KpiHistory;
                        }

                        $kpiHistory->employee_kpis_id = $employeeKpi->getId();
                        $kpiHistory->actual = trim($score);
                        $kpiHistory->month = $month;
                        $kpiHistory->year = $year;
                        $kpiHistory->self_actual = 0;
                        $kpiHistory->save();                    
                    } else {
                        $error = true;
                        $result .= 'KPI Template Not Found  <br>'.
                                   '==> BSC : [' .$bsc . ']' . $data[2] .'<br>' .
                                   '==> KPI : [' .$kpi . ']' . $data[3] .'<br><br>' ;
                    }
                } else {
                    $error = true;
                    $result .= 'NIK \'' . $nik . '\' Not Found <br><br>';
                }
            }
            if($error == false) {
                $result = 'Upload Achievement Success';
            } else {
                $result = '=== Some Error found ===<br><br><br>' . $result;
            }
        }
        return redirect('em/kpi/subordinate/upload/achievement')->with('message', $result);
    }       

}
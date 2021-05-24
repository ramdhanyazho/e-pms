<?php

namespace App;

use App\User;
use App\AppSetting;
use App\KpiTemplate;
use App\EmployeeKpis;
use App\ReviewSchedule;

class Employee extends User {

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 
    ];

	public function __construct() {
		parent::__construct();
	}

    public function acl() {
        return $this->belongsTo('App\ACL', 'acl_assigned_id', 'assigned_id');
    }

    public function isACLAuthorized($route) {
        $allowedRoutes = $this->acl->getRoutesLists();

        if ($allowedRoutes == '*') return true;
        if (strpos($allowedRoutes, ',') > 0) {
            $allowedRoutesArray = explode(',', $allowedRoutes);
            foreach ($allowedRoutesArray as $ar) {
                if (strpos($route, $ar) === 0) return true;
            }
            return false;
        }
        if (strpos($route, $allowedRoutes) === 0) return true;
        return false;
    }

    public function todolists() {
        return $this->hasMany('App\TodoList', 'user_id');
    }

    public function activiti() {
        return $this->hasMany('App\Activiti', 'user_id');
    }

    public function log() {
        return $this->hasMany('App\Logz', 'user_id');
    }

    public function getScheduler() {
        return $this->hasMany('App\ReviewSchedule', 'scheduler_id');
    }

    public function getScheduled() {
        return $this->hasMany('App\ReviewSchedule', 'scheduled_id');
    }

    private function getActiveKPIYear() {
        return AppSetting::GetCurrentActiveKPIYear();
    }

	public function getId() {
		return $this->id;
	}

	public function getGroupId() {
		return $this->group_id;
	}

    public function photo() {
        if (file_exists( public_path() . '/images/' . $this->id . '.jpg')) {
            return '/images/' . $this->id .'.jpg';
        } else {
            return '/skin/img/dummy/side-profile.png';
        }     
    }


	// Personal properties
	public function getName() {
		return ucwords(strtolower($this->name));
	}

    public function getEmail() {
        return $this->email;
    }

	public function getPersonalEmail() {
        return $this->email;
    }

	public function getDoB() {
        // belum ada di tableny
        // return $this->
    }

	public function getAge() {}

	public function getGender() {}

	// Employment properties
	public function getNIK() {
        return $this->nik;
    }

    public function getCleanNIK() {
        return trim($this->getNIK());
    }

    public function getTitle() {
    	return ucwords(strtolower($this->title));
    }

    public function levels() {
        //functionnya pake s karena field nya 'level' juga
        return $this->belongsTo('App\Levels', 'level');
    }

    public function getStatusId() {
        return $this->status;
    }

	public function getStatus() {
        switch ($this->status) {
            case 1:
                $return = 'Contract';
                break;
            case 2:
                $return = 'Permanent';
                break;

            case 3:
                $return = 'Mutated';
                break;

            case 9:
                $return = 'Terminated';
                break;

            default:
                $return = 'n/a';
                break;
        }
        return $return;
    }

    public function setStatusId($statusId) {
        $this->status = $statusId;
    }

    public function isPermanent() {
        if ($this->status == 2) return true;
        return false;
    }

    public function isOD() {
        // TODO: This shouldn't be hardcoded
        if ($this->acl_assigned_id == 300) return true;
        return false;
    }

    public function getQuitDate() {
        return $this->getTerminationDate();
    }

    public function getTerminationDate() {
        return ($this->quit_date != NULL ? $this->quit_date : 'N/A');
    }

    public function setQuitDate($date) {
        $dateArr = explode('/', $date);
        $date = mktime(0, 0, 0, $dateArr[1], $dateArr[0], $dateArr[2]);
        $formattedDate = date('Y-m-d', $date);
        $this->quit_date = $formattedDate;
    }

    public function setTermination($quitDate) {
        $this->setStatusId(9);
        $this->setQuitDate($quitDate);
        $this->save();
    }

    public function isTerminated() {
        return ($this->status == 9);
    }

    public function costcenter() {
        return $this->belongsTo('App\CostCenter', 'costcenter_id');
    }

    public function division() {
        return $this->belongsTo('App\Division', 'org_unit_id');
    }

    public function businessUnit() {
        return $this->belongsTo('App\BusinessUnits', 'business_unit_id');
    }

    public function company() {
        return $this->belongsTo('App\Company', 'company_id');
    }

	public function location() {
        return $this->belongsTo('App\Location', 'location_id');
    }

    public function getJoinDate() {
        return date('M d, Y', strtotime($this->join_date));
    }

	public function getEndContract() {
        return ($this->contract_ended ? date('M d, Y', strtotime($this->contract_ended)) : '-');
    }

    public function isHavingSuperordinate() {
        return ($this->getSuperordinateNIK() != null);
    }

    public function getSuperordinateNIK() {
        return $this->superordinate_nik;
    }

	public function getSuperordinate() {
        if ($this->getSuperordinateNIK() != null) {
            return Employee::where('nik', $this->getSuperordinateNIK())->first();
        }
        return null;
    }

    public function isHavingSubordinate() {
        return (count($this->getSubordinate()) > 0);
    }

	public function getSubordinate() {
		// return Employee::where('superordinate_id', $this->id)->get();
        return Employee::where('superordinate_nik', $this->getNIK())
                ->where('status', '<>', 9)
                ->orderBy('name', 'ASC')->get();
    }

    public function getSubordinateCount() {
    	return (count($this->getSubordinate()) > 0 ? count($this->getSubordinate()) . ' person' : '-');
    }

	// Performance properties
	public function getKPI() {
        return $this->hasMany('App\EmployeeKpis', 'employee_id', 'id')->where('year', $this->getActiveKPIYear());
    }

    public function getKPIByYear($year) {
        return $this->hasMany('App\EmployeeKpis', 'employee_id', 'id')->where('year', $year);
    }

    public function getEvaluationPeriod() {
        $month = date('n');
        if ($month >= 1 && $month <= 3) return 'Q1';
        if ($month >= 4 && $month <= 6) return 'Q2';
        if ($month >= 7 && $month <= 9) return 'Q3';
        if ($month >= 10 && $month <= 12) return 'Q4';
    }

	public function getScheduledTime() {}

	// General properties
	public function getDashboard() {}

	public function getToDoList() {}

	public function getAnnouncement() {}

	public function getActivity() {}

	public function getFAQ() {}

	public function getTasks() {
	   return $this->todolists;
    }
    
    private function getSubordinateIds() {
        $subordinates = $this->getSubordinate();
        $subordinateIds = [];
        foreach ($subordinates as $subord) {
            array_push($subordinateIds, $subord->getId());
        }

        return $subordinateIds;
    }

    public function getKPIUnprocessed() {
        return EmployeeKpis::where('employee_id', $this->getId())
                            ->where('actual', 0)
                            ->where('year', $this->getActiveKPIYear())
                            ->count();
    }

    public function getSubordinateKPIUnprocessed() {
        $subordinateIds = $this->getSubordinateIds();
        if (count($subordinateIds) == 0) {
            return 0;
        }

        return EmployeeKpis::whereIn('employee_id', $subordinateIds)
                            ->where('actual', 0)
                            ->where('year', $this->getActiveKPIYear())
                            ->count();
    }

    public function getODKPIUnprocessed() {
        if (!$this->isOD()) {
            return 0;
        }

        return EmployeeKpis::where('actual', 0)->count();
    }

	public function getKPIProgress() {
        return EmployeeKpis::where('employee_id', $this->getId())
                                ->where('actual', '>', 0)
                                ->where('actual', '<', 5)
                                ->where('year', $this->getActiveKPIYear())
                                ->count();
    }
    
    public function getSubordinateKPIProgress() {
        $subordinateIds = $this->getSubordinateIds();
        if (count($subordinateIds) ==0) {
            return 0;
        }

        return EmployeeKpis::whereIn('employee_id', $subordinateIds)
                                ->where('actual', '>', 0)
                                ->where('actual', '<', 5)
                                ->where('year', $this->getActiveKPIYear())
                                ->count();
    }

    public function getODKPIProgress() {
        if (!$this->isOD()) {
            return 0;
        }

        return EmployeeKpis::where('actual', '>', 0)
                            ->where('actual', '<', 5)->count();
    }

    public function getKPICompleted() {
        return EmployeeKpis::where('employee_id', $this->getId())
                            ->where('actual', 5)
                            ->where('year', $this->getActiveKPIYear())
                            ->count();
    }

    public function getSubordinateKPICompleted() {
        $subordinateIds = $this->getSubordinateIds();
        if (count($subordinateIds) == 0) {
            return 0;
        }

        return EmployeeKpis::whereIn('employee_id', $subordinateIds)->where('actual', 5)->count();
    }

    public function getODKPICompleted() {
        if (!$this->isOD()) {
            return 0;
        }

        return EmployeeKpis::where('actual', 5)->count();
    }

    public function getPositionId() {
        return $this->position_id;
    }

    public function getScheduleSchedule() {
        return ReviewSchedule::where('is_scheduled', false)
                ->where('is_waiting_approval', false)
                ->where('is_completed', false)
                ->where(function($query) {
                    return $query->where('scheduler_id', $this->id)
                            ->orWhere('scheduled_id', $this->id);
                })
                ->orderBy('created_at', 'asc')
                ->get();
    }

    public function getScheduleApproval() {
        return ReviewSchedule::where(function($query) {
                $query->where('scheduled_id', $this->id)
                        ->orWhere('scheduler_id', $this->id);
                })
                ->where(function($query) {
                    $query->where('is_approval_scheduled', null)
                        ->orWhere('is_approval_scheduler', null)
                        ->orWhere('is_approval_scheduled', false)
                        ->orWhere('is_approval_scheduler', false);
                })
                ->where('is_scheduled', true)
                ->orderBy('created_at', 'asc')
                ->get();
    }

    public function getScheduleComplete() {
        return ReviewSchedule::where(function($query){
                    $query->where('scheduler_id', $this->id)
                    ->orWhere('scheduled_id', $this->id);
                })
                ->where('is_approval_scheduled', true)
                ->where('is_approval_scheduler', true)
                ->orderBy('created_at', 'asc')
                ->get();
    }

    public function getTemplateKPI() {
        $positionId = $this->position_id;
        return KpiTemplate::select('bsc_id')
                ->where(function($q) use ($positionId){
                    $q->where('position_id', $positionId)
                    ->orWhere('position_id', -1);
                })
                ->groupBy('bsc_id')->get();
    }

    public function getScheduledList() {
        $list = array();
        $superOrdinate = $this->getSuperordinate();

        if($superOrdinate) {
            $list[] = array('id' => $superOrdinate->id, 'name' => $superOrdinate->name);
        }

        $subOrdinates = Employee::where('superordinate_nik', $this->getNIK())->orderBy('name', 'ASC')->get();
        
        foreach ($subOrdinates as $subOrdinate) {
            $list[] = array( 'id' => $subOrdinate->id, 'name' => $subOrdinate->name);
        }
        return $list;
    }

    public function getFinalScore($year = null) {
        if ($year == null) {
            $year = $this->getActiveKPIYear();
        }
        $kpis = $this->getKPIByYear($year)->get();
        $totalScore = 0;
        $numOfKPIs = count($kpis);
        foreach ($kpis as $kpi) {
            $score = $kpi->getScore();
            $weight = $kpi->getWeight();
            $tmpScore = $score * ($weight / 100);
            $totalScore = $totalScore + $tmpScore;
        }
        if ($numOfKPIs == 0) return number_format(0, 2);

        $finalScore = $totalScore / $numOfKPIs;
        return number_format($finalScore, 2);
    }


}

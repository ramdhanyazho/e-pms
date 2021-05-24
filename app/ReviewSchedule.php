<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class ReviewSchedule extends Model
{
	protected $table = 'schedules';

    protected $fillable = [
        'scheduler_id', 
        'scheduled_id', 
        'is_scheduled', 
        'scheduled_contents',
        'is_waiting_approval',
        'approval_contents',
        'is_completed',
		'completed_contents',
		'date',
        'month',
        'year',
        'scheduled_date',
        'is_approval_scheduler',
        'is_approval_scheduled',
        'approval_scheduled_date',
        'approval_scheduler_date'
    ];

	public function getScheduled() {
		return Self::where('is_scheduled', true)
				->where('is_waiting_approval', false)
				->where('is_completed', false)
				->get();
	}

    public function employeeKpi() {
        return $this->belongsTo('App\EmployeeKpis', 'employee_kpis_id');
    }

    public function attachments() {
        return $this->hasMany('App\Attachment', 'schedule_id');
    }

	public function getWaitingApprovals() {
		return Self::where('is_scheduled', true)
				->where('is_waiting_approval', true)
				->where('is_completed', false)
				->get();		
	}

	public function getCompleted() {
		return Self::where('is_approval_scheduled', true)
				->where('is_approval_scheduled', true)
				->get();		
	}

	public function getSchedulerEmployee() {
		return $this->belongsTo('App\Employee', 'scheduler_id');
	}

    public function getSubmitDate() {
        return date('F d, Y / H:s', strtotime($this->created_at));
    }

	public function getScheduledEmployee() {
		return $this->belongsTo('App\Employee', 'scheduled_id');
	}

    public function getId() {
        return $this->id;
    }

    public function getScheduledContent() {
        if ($this->scheduled_contents == null) {
            return '-';
        }
        
        $result = substr($this->scheduled_contents, 1, -1);
        $result = str_replace(array('\r\n', '\r', '\n'), "<br>", $result);
        return $result;
    }

    public function getApprovalContent() {
        if ($this->approval_contents == null) {
            return '-';
        }

        $result = substr($this->approval_contents, 1, -1);
        $result = str_replace(array('\r\n', '\r', '\n'), "<br>", $result);
        return $result;
    }

    public function getImage() {
        return $this->hasMany('App\Attachment', 'schedule_id');
    }

    public function getApprovalName() {
        if(Auth::user()->id == $this->scheduler_id) {
            return $this->getSchedulerEmployee;
        } else {
            return $this->getScheduledEmployee;
        }
	}
	
	public function getDate() {
		return $this->date;
	}

    public function getMonth() {
        return str_pad($this->month, 2, '0', STR_PAD_LEFT);
    }

    public function getYear() {
        return $this->year;
	}

	private function getFormattedProposedDate() {
		return date("F j, Y", mktime(0, 0, 0, $this->getMonth(), $this->getDate(), $this->getYear()));
	}
	
	public function getFormattedDate() {
		return $this->getFormattedProposedDate();
	}
}

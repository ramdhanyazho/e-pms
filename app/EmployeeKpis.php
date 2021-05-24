<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeKpis extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee_kpis';

    protected $fillable = [
        'employee_id', 
        'year', 
        'kpi_templates_id',
        'weight',
        'actual',
        'self_actual',
        'target',
        'indicators'
    ];

    public function employee() {
        return $this->belongsTo('App\Employee', 'employee_id');
    }

    public function kpiTemplate() {
        return $this->belongsTo('App\KpiTemplate', 'kpi_templates_id', 'id');
    }


    public function getHistory() {
        return $this->hasMany('App\KpiHistory', 'employee_kpis_id', 'id');
    }

    public function getId() {
        return $this->id;
    }

    public function getKPI() {
        return $this->kpi_id;
    }

    public function getYears() {
        return $this->year;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getSelfActual() {
        if ($this->self_actual == null) {
            return '-';
        } else {
            return $this->self_actual;
        }
    }

    public function getSelfAppraisal() {
        return $this->getSelfActual();
    }

    public function getAchievement() {
        return $this->actual;
    }

    public function getScore() {
        return $this->actual;
    }

    public function getStatus() {
        if($this->actual == 100) return 'Complete';
        return 'On Progress';
    }

    public function getClassStatusSub() {
        if($this->actual == 100) return 'text-main';
        return '';
    }

    public function getClassStatusIndex() {
        if($this->actual == 100) return 'text-green font-semibold';
        return '';
    }

    public function getDueDate() {
        return '12 Oct 2019';
    }

    public function getTarget() {
        return $this->target;
    }

    public function getIndicators() {
        if($this->indicators) {
            return json_decode($this->indicators);
        } else {
            return (object) array('indicator1' => '',
                'indicator2' => '',
                'indicator3' => '',
                'indicator4' => '',
                'indicator5' => '');
        }
    }

    public static function isValidWeight($employeeId, $year, $weightAdd, &$currentWeight) {
        $currentWeight = self::select('weight')
                ->where('employee_id', $employeeId)
                ->where('year', $year)
                ->sum('weight');
        $total = $currentWeight + $weightAdd;
        if($total > 100) {
            return false;
        } else {
            return true;
        }
    }

}
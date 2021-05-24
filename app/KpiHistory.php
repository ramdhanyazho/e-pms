<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KpiHistory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee_kpis_histories';

    protected $fillable = [
        'employee_kpis_id', 
        'actual', 
        'self_actual', 
        'month',
        'year',
    ];

    public function getYear() {
        return $this->year;
    }

    public function getId() {
        return $this->id;
    }

    public function getMonth() {
        return $this->month;
    }

    public function getActual() {
        return $this->actual;
    }

    static public function getHistory($employee_kpis_id, $month) {
        $history = [];
        $datas = Self::where('employee_kpis_id', $employee_kpis_id)
                ->where('month', $month)
                ->orderBy('created_at', 'desc')
                ->limit(1)
                ->get();
        if (count($datas) > 0) {
            foreach ($datas as $data) {
                    $history[$data->month] = $data->actual;
            }
            return $history[$month];
        } else {
            return '-';
        }
    }
}
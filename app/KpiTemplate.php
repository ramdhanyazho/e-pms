<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KpiTemplate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kpi_templates';

    protected $fillable = [
        'location_id', 
        'business_unit_id', 
        'division_id', 
        'department_id', 
        'bsc_id', 
        'kra_id', 
        'kpi_id', 
        'position_id', 
        'is_protected'
    ];

    public function position() {
        return $this->belongsTo('App\Position', 'position_id');

    }

    public function kpi() {
        return $this->belongsTo('App\Kpi', 'kpi_id');
    }

    public function getId() {
        return $this->id;
    }

    public function bsc() {
        return $this->belongsTo('App\Bsc', 'bsc_id');
    }

    public function kra() {
        return $this->belongsTo('App\Kra', 'kra_id');
    }

    public function getIsProtected() {
        return $this->is_protected;
    }

    public function getLocation() {
        return $this->location_id;
    }

    public function getBusinessUnitId() {
        return $this->business_unit_id;
    }

    public function getDivisionId() {
        return $this->division_id;
    }

    public function getDepartmentId() {
        return $this->department_id;
    }
}
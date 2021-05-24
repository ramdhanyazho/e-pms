<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kpis';
    protected $fillable = ['name'];

    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessUnits extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'business_units';

    public function getId() {
    	return $this->id;
    }

    public function getBusinessUnit() {
        return $this->name;
    }

    public function getName() {
        return $this->name;
    }
}
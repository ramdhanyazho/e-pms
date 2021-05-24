<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'departments';

    public function getDepartment() {
        return $this->name;
    }

    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }
}
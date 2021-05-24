<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'divisions';

    public function getId() {
    	return $this->id;
    }

    public function getName() {
    	return ucwords(strtolower($this->name));
    }
}

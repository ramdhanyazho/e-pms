<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kra extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kras';

    public function getId() {
    	return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }
}
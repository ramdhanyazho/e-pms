<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bsc extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bscs';

    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }
}
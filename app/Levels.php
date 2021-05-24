<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'levels';

    public function getLevel() {
        return ucwords(strtolower($this->name));
    }
}
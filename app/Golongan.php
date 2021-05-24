<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
	protected $table = 'golongans';

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return ucwords(strtolower($this->name));
	}
}

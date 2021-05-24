<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
	protected $table = 'positions';

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}
}

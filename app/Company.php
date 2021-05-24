<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'companies';

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}
}

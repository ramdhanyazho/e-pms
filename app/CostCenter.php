<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostCenter extends Model
{
	protected $table = 'costcenters';

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}
}

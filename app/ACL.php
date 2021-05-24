<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ACL extends Model
{
	protected $table = 'acls';

	public function getId() {
		return $this->id;
	}

	public function getAssignedId() {
		return $this->assignedId;
	}

	public function getName() {
		return $this->name;
	}

	public function getRoutesLists() {
		return $this->routeslist;
	}
}

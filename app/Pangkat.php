<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
	protected $table = 'pangkats';

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return ucwords(strtolower($this->name));
	}
}

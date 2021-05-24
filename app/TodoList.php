<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
	protected $table = 'todolists';

    protected $fillable = [
        'user_id', 'creator', 'todo', 'is_done'
    ]; 

	public function getId() {
		return $this->id;
	}

	public function getUserId() {
		return $this->user_id;
	}

	public function getCreator() {
		return $this->creator;
	}

	public function getToDo() {
		return $this->todo;
	}

	public function isDone() {
		return $this->is_done;
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
	protected $table = 'attachments';

    protected $fillable = [
        'title', 
        'filepath',
        'schedule_id'
    ];

    

    public function getPathImage() {
        return $this->filepath;
    }


}
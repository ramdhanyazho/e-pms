<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $table = 'settings';

    protected $fillable = [
        'deadline'
    ]; 

	static public function  getDeadline() {
        $setting = Setting::orderBy('created_at', 'desc')->first();
        if($setting) return date('m/d/Y', strtotime($setting->deadline));
        return '00/00/0000';
		
	}

    static public function  isDeadline() {
        $setting = Setting::orderBy('created_at', 'desc')->first();
        if($setting->deadline < date('Y-m-d')) return true;
        return false;
        
    }
}

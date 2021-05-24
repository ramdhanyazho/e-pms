<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logz extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'logs';

    public function user() {
    	return $this->belongsTo('App\Employee');
    }

    public function getDate() {
    	return date('M d, Y', strtotime($this->created_at));
    }

    public function getTime() {
    	return date('H:i a', strtotime($this->created_at));
    }

    public function getUserId() {
    	return $this->user_id;
    }

    public function getPage() {
    	return trim(preg_replace('/\s+/', ' ', $this->page));
    }

    public function getIPAddr() {
    	return $this->ip_addr;
    }

    public function getUserAgent() {
    	return $this->user_agent;
    }

    public function getActivity() {
        return $this->activity;
    }

    public function getData() {
    	return $this->data;
    }
}
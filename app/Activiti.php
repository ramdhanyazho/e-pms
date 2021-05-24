<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Mail;
use App\Mail\SendMailable;

class Activiti extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'activities';

    public static function record($action) {
        $activiti = new self;
        $activiti->user_id = -1;
        if (Auth::check()) $activiti->user_id = Auth::user()->id;
        $activiti->action = $action;
        $activiti->save();

        // self::sendEmailActivity('(' . trim(Auth::user()->nik) . ') '. Auth::user()->name . ' ' . $action);
    }

    public function user() {
        return $this->belongsTo('App\Employee');
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getDate() {
        return date('M d, Y', strtotime($this->created_at));
    }

    public function getTime() {
        return date('H:i a', strtotime($this->created_at));
    }

    public function getAction() {
        return $this->action;
    }

    public static function sendEmailActivity($activity) {
        // Mail::to(config('app.admin_email'))->queue(new SendMailable($activity));
    }
}
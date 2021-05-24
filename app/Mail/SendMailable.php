<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $activity;

    public function __construct($activity)
    {
        $this->activity = $activity;
    }
    
    public function build()
    {
        return $this->subject('Activity Notification')
                    ->view('emails.od_activity');
    }
}
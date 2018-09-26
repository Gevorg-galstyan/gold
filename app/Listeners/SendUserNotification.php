<?php

namespace App\Listeners;

use App\Events\AddEditUser;
use App\Mail\AddEditUserData;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendUserNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AddEditUser  $event
     * @return void
     */
    public function handle(AddEditUser $event)
    {
        Mail::to($event->user->email)->send(new AddEditUserData($event->user));
    }
}

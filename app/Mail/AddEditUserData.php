<?php

namespace App\Mail;

use App\Models\Mail as Mail_model;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddEditUserData extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email_details = Mail_model::where('key', 'send-create-user')->orWhere('key', 'send-update-user')->get();
        $user = $this->user;
        $text = $email_details->where('key', 'send-' . (!$user->id ? 'create' : 'update') . '-user')->first()->translate($user->locale)->body;
        $text = str_replace('{name}', $user->name, $text);
        $text = str_replace('{company_name}', config('app.name'), $text);
        $text = str_replace('{email}', $user->email, $text);
        $text = str_replace('{login}', $user->login, $text);
        $text = str_replace('{password}', $user->password, $text);
        if ($text) {
            return $this->markdown('emails.add-edit-user-data', compact('user', 'text'))->subject($email_details->where('key', $user->id ? 'send-update-user' : 'send-create-user')->first()->translate($user->locale)->subject);
        }
        return false;
    }
}

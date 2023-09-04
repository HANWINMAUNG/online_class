<?php
namespace App\Mail;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
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
        $password_success_link = URL::temporarySignedRoute(
            'get.login',
            Carbon::now()->addMinutes(3),
            ['user_id' => $this->user->id]
       );
       return $this->subject("Success Password From Online_class")
                        ->from('onlineclass@gmail.com')
                        ->view('frontend.email.success_password',
                        ['user' => $this->user,
                          'password_success_link' => $password_success_link
                       ]);
    }
    
}

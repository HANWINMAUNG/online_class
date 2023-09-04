<?php
namespace App\Mail;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $admin;
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $password_reset_link = URL::temporarySignedRoute(
            'reset-password.index',
            Carbon::now()->addMinutes(3),
            ['admin_id' => $this->admin->id]
       );
       return $this->subject("Forget Password From Online_class")
                        ->from('onlineclass@muse.com')
                        ->view('backend.email.forgot_password',
                        ['admin' => $this->admin,
                          'password_reset_link' => $password_reset_link
                        ]);
    }
}

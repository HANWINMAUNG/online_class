<?php
namespace App\Jobs;

use App\Models\User;
use Illuminate\Mail\Mailer;
use Illuminate\Bus\Queueable;
use App\Mail\UserForgotPasswordMail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendUserForgotPasswordEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $mailer
                    ->to($this->user->email , $this->user->name)
                    ->send(new UserForgotPasswordMail($this->user));
    }
}

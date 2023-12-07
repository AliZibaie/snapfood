<?php

namespace App\Jobs;

use App\Mail\WelcomeMail;
use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class ProcessSendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private User $user)
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
//        $email = new WelcomeMail();
//        $this->user->notify(new WelcomeNotification());
        Notification::send($this->user, new WelcomeNotification());
//        Mail::to($this->user->email)->send($email);
    }
}

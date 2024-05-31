<?php

namespace App\Jobs;

use App\Http\Controllers\Auth\VerificationController;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationEmail;
class SendConfirmationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    public $user;

    /**
     * Create a new job instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new ConfirmationEmail($this->user));
        //Mail::to($this->user->email)->send(new VerificationController); implemented 
    }

    /*public function failed(Exception $exception)
    {
        // Handle the failure
        Log::error('Confirmation email job failed', ['exception' => $exception]);
    }*/
}

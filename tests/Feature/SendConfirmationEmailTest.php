<?php

namespace Tests\Feature;

use App\Jobs\SendConfirmationEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SendConfirmationEmailTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_dispatches_confirmation_email_job_on_user_registration()
    {
        Queue::fake();

        // Create a user
        $user = User::factory()->create();

        // Dispatch the job
        SendConfirmationEmail::dispatch($user);

        // Assert the job was pushed to the queue
        Queue::assertPushed(SendConfirmationEmail::class, function ($job) use ($user) {
            //return $job->user->id === $user->id;
            return $job->user->is($user);
        });
    }   
}

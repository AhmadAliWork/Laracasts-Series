<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    # public $timeout = 1; // we want to terminate job after 1 min so when we run queue:work it will kill after 1 min bcoz in handle I have added sleep for 3 seconds
    # public $tries = 3; # it tries 3 times and then exit for example if I add exception in handle method
    # public $backoff = 2; // it wait for 2 sec and not run immediately
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
//      throw new \Exception("Failed");
        sleep(3);
        info("laravel-queue-mastery");
    }
}

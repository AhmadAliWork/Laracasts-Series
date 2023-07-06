<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReconcileAccount implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  protected User $user;

  /**
   * Create a new job instance.
   */
  public function __construct(User $user)
  {
    //
    $this->user = $user;
  }

  /**
   * Execute the job.
   */
  public function handle(Filesystem $file): void # we can also typehint any dependency e.g. Filesystem here
  {
//    throw new \Exception("Woops!"); # php artisan  queue:work --tries=3
    # we fix the bug and  php artisan queue:retry all
    logger("Reconciling the user. {$this->user->name}");
  }
}

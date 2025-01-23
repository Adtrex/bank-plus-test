<?php

namespace App\Listeners;

use App\Events\TransactionMade;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogTransaction
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     */
    public function handle(TransactionMade $event): void
    {
        Log::info('This'. 'transaction ', ['id' => $id]);
    }
}

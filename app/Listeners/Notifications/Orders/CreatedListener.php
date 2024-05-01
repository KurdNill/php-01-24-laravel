<?php

namespace App\Listeners\Notifications\Orders;

use App\Events\OrderCreated;

class CreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        logs()->info('Listener triggered');

    }
}

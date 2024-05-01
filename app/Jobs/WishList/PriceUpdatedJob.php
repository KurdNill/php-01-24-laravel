<?php

namespace App\Jobs\WishList;

use App\Models\Product;
use App\Notifications\Wishlist\PriceDownNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class PriceUpdatedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public readonly Product $product)
    {
        $this->onQueue('wishilist-notify');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->product->followers()
            ->wherePivot('price', true)
            ->chunk(1, function (Collection $users) {
                logs()->info('Price notification send for users');
                sleep(5);
                Notification::send(
                    $users,
                    // new PriceDownNotification($this->product)
                    app(PriceDownNotification::class, ['product' => $this->product])
                );
            });
    }
}

<?php

namespace App\Observers;

use App\Jobs\WishList\PriceUpdatedJob;
use App\Jobs\WishList\ProductExistsJob;
use App\Models\Product;

class WishListObserver
{
    //    /**
    //     * Handle the Product "created" event.
    //     */
    //    public function created(Product $product): void
    //    {
    //        //
    //    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        if ($product->finalPrice < $product->getOriginal('finalPrice')) {
            PriceUpdatedJob::dispatch($product);
        }

        if ($product->isExists && ! $product->getOriginal('isExists')) {
            ProductExistsJob::dispatch($product);
        }
    }
    //
    //    /**
    //     * Handle the Product "deleted" event.
    //     */
    //    public function deleted(Product $product): void
    //    {
    //        //
    //    }
    //
    //    /**
    //     * Handle the Product "restored" event.
    //     */
    //    public function restored(Product $product): void
    //    {
    //        //
    //    }
    //
    //    /**
    //     * Handle the Product "force deleted" event.
    //     */
    //    public function forceDeleted(Product $product): void
    //    {
    //        //
    //    }
}

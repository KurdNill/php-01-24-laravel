<?php

namespace App\Http\Controllers;

use App\Http\Requests\WishListRequest;
use App\Models\Product;

class WishListController extends Controller
{
    public function add(Product $product, WishListRequest $request)
    {
        auth()->user()->addToWish($product, $request->get('type'));

        notify()->success();
    }
}

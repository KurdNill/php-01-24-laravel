<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\Contract\InvoicesServiceContract;

class InvoicesController extends Controller
{
    public function __invoke(Order $order)
    {
        $this->authorize('view', $order);

        return app(InvoicesServiceContract::class);
    }
}

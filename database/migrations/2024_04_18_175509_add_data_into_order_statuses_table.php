<?php

use App\Enums\OrderStatusEnum;
use App\Models\OrderStatus;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach (OrderStatusEnum::cases() as $case) {
            OrderStatus::firstOrCreate(['name' => $case->value]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

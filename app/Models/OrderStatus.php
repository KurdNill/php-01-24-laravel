<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderStatus extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $casts = [
        'name' => OrderStatusEnum::class,
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}

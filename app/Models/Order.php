<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','sub_total','discount','grand_total'];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}

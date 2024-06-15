<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabletOrderLines extends Model
{
    protected $fillable = [
        'tablet_order_id',
        'dish_id',
        'quantity',
        'price',
    ];

    public function order()
    {
        return $this->belongsTo(TabletOrder::class);
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}

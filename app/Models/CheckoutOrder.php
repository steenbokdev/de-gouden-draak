<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutOrder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['dish_id', 'side_dish', 'price_per_item', 'item_count'];

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}

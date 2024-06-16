<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TabletOrder extends Model
{
    protected $fillable = [
        'tablet_id',
        'round',
        'order_time',
    ];

    public function orderLines(): HasMany
    {
        return $this->hasMany(TabletOrderLines::class);
    }
}

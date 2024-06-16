<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Round extends Model
{
    protected $fillable = ['tablet_id', 'round'];

    public function tablet(): BelongsTo
    {
        return $this->belongsTo(User::class, 'tablet_id', 'employee_id');
    }
}

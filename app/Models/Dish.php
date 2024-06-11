<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Dish extends Model
{
    use HasFactory, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['menu_number', 'menu_addition', 'name', 'price', 'category', 'description'];

    public $sortable = ['menu_number', 'name', 'category'];

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }
}

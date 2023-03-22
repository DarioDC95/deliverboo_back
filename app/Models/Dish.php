<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = ['restaurant_id', 'name', 'description', 'ingredients', 'price', 'visible', 'image_path', 'vegetarian', 'vegan'];

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }
}

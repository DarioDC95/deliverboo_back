<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['restaurant_id', 'name_client', 'surname_client', 'email_client', 'phone_client', 'address_client', 'total_price', 'delivered'];

    public function resturant() {
        return $this->belongsTo(Restaurant::class);
    }

    public function dishes() {
        return $this->belongsToMany(Dish::class);
    }
}

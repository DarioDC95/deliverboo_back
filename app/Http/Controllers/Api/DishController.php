<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index($id) {

        $dishes = Dish::with('restaurant', 'restaurant.user')->where('restaurant_id', $id)->get();

        if($dishes) {
            return response()->json([
                'success' => true,
                'result' => $dishes
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'error' => 'Nessun piatto trovato'
            ]);
        }
    }
}

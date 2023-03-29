<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index() {

        $restaurant = Restaurant::with('user', 'types', 'dishes')->paginate(4);

        return response()->json([
            'success' => true,
            'result' => $restaurant
        ]);
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function index() {

        $restaurant = Restaurant::with('user', 'types', 'dishes')->paginate(4);

        return response()->json([
            'success' => true,
            'result' => $restaurant
        ]);
    }

    public function filter($types) {

        $types = explode(',', $types);

        $restaurant = Restaurant::with('user', 'types', 'dishes')
                                ->whereExists(function ($query) use($types) {
                                    $query->select(DB::raw(1))
                                        ->from('restaurant_type')
                                        ->whereIn('restaurant_type.type_id', $types)
                                        ->whereRaw('restaurant_type.restaurant_id = restaurants.id');
                                })
                                ->paginate(4);
        
        return response()->json([
            'success' => true,
            'result' => $restaurant
        ]);
    }
}
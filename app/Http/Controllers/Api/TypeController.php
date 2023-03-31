<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index() {

        $types = Type::with('restaurants')->get();

        return response()->json([
            'success' => true,
            'result' => $types
        ]);
    }
}

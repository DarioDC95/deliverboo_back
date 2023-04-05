<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function  store(Request $request){
        $form_data = $request->all();

        $validator = Validator::make($form_data, [
            'name_client' => 'required',
            'surname_client' => 'required',
            'email_client' => 'required',
            'phone_client' => 'required',
            'address_client' => 'required',
            'shopping_cart.*.*.dish.id' => 'exists:dishes,id',
            'shopping_cart.*.*.dish.price' => 'required',
            'shopping_cart.*.*.dish.restaurant.p_iva' => 'exists:restaurants,p_iva'
        ]);

        foreach ($form_data['shopping_cart'] as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
                $validator->sometimes("shopping_cart.$key1.$key2.dish.price", Rule::exists('dishes', 'price')->where(function ($query) use ($value2) {
                    $query->where('id', $value2['dish']['id']);
                }), function () {
                    return true;
                });
            }
        }

        if($validator->fails()){  
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        foreach ($form_data['shopping_cart'] as $key => $value) {
            // code
        }

        // $newOrder = new Order(); 
        // $newOrder->fill($form_data);
        // $newOrder->save();

        // Mail::to('info@boolpres.com')->send(new Order());

        return response()->json([
            'success' => true,
            'result' => $request->all()
        ]);
    }
}

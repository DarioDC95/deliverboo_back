<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;

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
        ]);

        if($validator->fails()){  
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        // $newOrder = new Order(); 
        // $newOrder->fill($form_data);
        // $newOrder->save();

        // Mail::to('info@boolpres.com')->send(new Order());

        return response()->json([
            'success' => 'è tutto ok'
        ]);
    }
}

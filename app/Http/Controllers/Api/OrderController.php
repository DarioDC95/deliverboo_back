<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
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
            $newOrder = new Order();

            $newOrder->restaurant_id = $value[0]['dish']['restaurant_id'];
            $newOrder->name_client = $form_data['name_client'];
            $newOrder->surname_client = $form_data['surname_client'];
            $newOrder->email_client = $form_data['email_client'];
            $newOrder->phone_client = $form_data['phone_client'];
            $newOrder->address_client = $form_data['address_client'];
            $newOrder->delivered = false;
            $newOrder->total_price = $this->partialTotal($value);

            $newOrder->save();

            $dishes = collect($value)->mapWithKeys(function ($item) {
                return [$item['dish']['id'] => ['quantity' => $item['quantity']]];
            });
        
            $newOrder->dishes()->attach($dishes);

            $form_mail = array(
                               'name_client' => $form_data['name_client'],
                               'surname_client' => $form_data['surname_client'],
                               'email_client' => $form_data['email_client'],
                               'phone_client' => $form_data['phone_client'],
                               'address_client' => $form_data['address_client'],
                               'dishes' => $value,
                               'order_id' => $newOrder->id
                              );

            Mail::to($form_mail['dishes'][0]['dish']['restaurant']['user']['email'])->send(new NewOrder($form_mail));
        }

        return response()->json([
            'success' => true,
            'result' => $form_mail
        ]);
    }

    private function partialTotal($value) {
        $partialPrice = 0;

        foreach ($value as $key => $item) {
            $partialPrice += number_format(($item['dish']['price'] * $item['quantity']), 2, '.', '');
        }

        return $partialPrice;
    }
}

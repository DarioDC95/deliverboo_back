<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $restaurant = Restaurant::where('user_id', $user->id)->get();

        return view('admin.dishes.create', compact('dish','restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dish = Dish::all();
        $restaurant = Restaurant::all();
        return view('admin.dishes.create', compact('dish','restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {
        $restaurant = Restaurant::all();
        $form_data = $request->validated();
        
        $form_data['restaurant_id'] = $restaurant[0]->id;
        $newDish = New Dish();
        $newDish->fill($form_data);
       
      
        

        if ($request->has('image_path')) {
            $img_cover = Storage::disk('public')->put('image_path', $request->image_path);

            $form_data['image_path'] = $img_cover;
        }

        if ($newDish->visible == 'false'){
            $newDish->visible = 0;
        }
        else {
            $newDish->visible = 1;
        }

        $newDish->save();

        return view('admin.dishes.index')->with('message','aggiunto piatto');



      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDishRequest  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        //
    }
}

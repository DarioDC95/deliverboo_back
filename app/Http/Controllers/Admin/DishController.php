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
        $restaurant = Restaurant::where('user_id',$user->id)->get();
        $dishes = Dish::where('restaurant_id', $restaurant[0]->id)->get();

        // dd($dishes);

        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {
        $user = Auth::user();
        $restaurant = Restaurant::where('user_id',$user->id)->get();

        $form_data = $request->validated();

        $form_data['restaurant_id'] = $restaurant[0]->id;
        if ($request->has('image_path')) {
            $img_cover = Storage::disk('public')->put('image_path', $request->image_path);

            $form_data['image_path'] = $img_cover;
        }

        $newDish = New Dish();
        $newDish->fill($form_data);

        $newDish->save();

        return redirect()->route('admin.dishes.index')->with('message','aggiunto piatto');
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
        return view('admin.dishes.edit', compact('dish'));
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
        
        $user = Auth::user();
        $restaurant = Restaurant::where('user_id',$user->id)->get();

        $form_data = $request->validated();

        $form_data['restaurant_id'] = $restaurant[0]->id;
        if ($request->has('image_path')) {
            if ($dish->image_path != null) {
                Storage::delete($dish->image_path);
            }
            $img_cover = Storage::disk('public')->put('image_path', $request->image_path);
            $form_data['image_path'] = $img_cover;
        }

        // dd($form_data);

        
        $dish->update($form_data);

        return redirect()->route('admin.dishes.index')->with('message','Piatto modificato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        if ($dish->image_path != null) {
            Storage::delete($dish->image_path);
        }

        //*Canacella i Piatto
        $dish->delete();
        return redirect()->route('admin.dishes.index')->with('message', 'Il Tuo Piatto è Stato Cancellato Con Successo! Bello.');
    }
}

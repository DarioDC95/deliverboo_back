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
    //! -INDEX-
    /**
     * Display a listing of the resource.
     ** Mostra l'elenco dei progetti.
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

    //! -CREATE-
    /**
     * Show the form for creating a new resource.
     ** Mostra il form e il metodo per creare un nuovo progetto.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    //! -STORE-
    /**
     * Store a newly created resource in storage.
     ** Salva il nuovo progetto nel Database.
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

        return redirect()->route('admin.dishes.index')->with('message','Aggiunto piatto');
    }

    //! -SHOW-
    /**
     * Display the specified resource.
     ** Visualizza la risorsa specificata.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    //! -EDIT-
    /**
     * Show the form for editing the specified resource.
     ** Vsualizza il modulo per la modifica della risorsa specificata.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', compact('dish'));
    }

    //! -UPDATE-
    /**
     * Update the specified resource in storage.
     ** Aggiorna la risorsa specificata nell'archiviazione.
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

        return redirect()->route('admin.dishes.index')->with('message','Piatto aggiornato');
    }

    //! -DESTROY-
    /**
     * Remove the specified resource from storage.
     ** Rimuove una risorsa specifica dallo storage.
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

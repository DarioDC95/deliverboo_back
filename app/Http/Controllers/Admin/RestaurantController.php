<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class RestaurantController extends Controller
{
    //! -INDEX-
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $types = Type::all();
        $restaurant = Restaurant::where('user_id', $user->id)->get();

        return view('admin.restaurants.index', compact('restaurant', 'types'));
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
        $types = Type::all();

        return view('admin.restaurants.create', compact('types'));
    }

    //! -STORE-
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestaurantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {

        $user = Auth::user();
        $form_data = $request->validated();
        $form_data['user_id'] = $user->id;

        if ($request->has('cover_path')) {
            $img_cover = Storage::disk('public')->put('cover_path', $request->cover_path);

            $form_data['cover_path'] = $img_cover;
        }


        $newRestaurant = Restaurant::create($form_data);


        if ($request->has('types')) {
            $newRestaurant->types()->attach($form_data['types']);
        }

        return redirect()->route('admin.index')->with('message', 'Il ristorante è stato creato con successo');
    }

    //! -SHOW-
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    //! -EDIT-
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        
    }

    //! -UPDATE-
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestaurantRequest  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        
        $user = Auth::user();

        // controlliamo se utente è lo stesso
        if($user->id == $request->user_id){
            $form_data = $request->validated();
            $form_data['user_id'] = $user->id;
    
            if ($request->has('cover_path')) {
                Storage::delete($restaurant->cover_path);
            }

            $img_cover = Storage::disk('public')->put('cover_path', $request->cover_path);
            $form_data['cover_path'] = $img_cover;
            
            $restaurant->update($forma_data);
        
            if($request->has('types')){
                $newRestaurant->types()->sync($form_data['types']);
            }
    
            return redirect()->route('admin.index')->with('message', 'Il ristorante è stato modificato con successo');
        }

        else{
            return redirect()->route('admin.restaurants.index')->with('message', 'Non fare lo sgargiullo');
        }
    }


        



    

    //! -DESTROY-
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}

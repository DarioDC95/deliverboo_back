<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = config('restaurantDB');

        // $restaurants =     [
        //     [
        //         'user_id' => 7,
        //         'p_iva' => '12345678910',
        //         'cover_path' => 'cover_path/',
        //         'address' => 'via pippo',
        //     ],
        // ];

        foreach ($restaurants as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->user_id = $restaurant['user_id'];
            $newRestaurant->p_iva = $restaurant['p_iva'];
            $newRestaurant->cover_path = $restaurant['cover_path'];
            $newRestaurant->address = $restaurant['address'];

            $newRestaurant->save();
        }
    }
}

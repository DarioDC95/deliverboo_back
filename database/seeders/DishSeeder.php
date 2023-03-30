<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = config('dishes');
        // $dishes = [
        //     [
        //         'restaurant_id' => '7',
        //         'name' => 'Pizza Margherita',
        //         'description' => 'La classica pizza margherita',
        //         'ingredients' => 'Base pizza, passata di pomodoro, mozzarella, basilico, olio extra vergine d\'oliva',
        //         'price' => 6.50,
        //         'image_path' => 'image_path/4H2rIPnBoWVbUJacjS4ty1N7piTYItjkJaN2UVdB.jpg',
        //         'visible' => 1,
        //         'vegetarian' => 1,
        //         'vegan' => 0,

        //     ]
        // ];

        foreach ($dishes as $dish) {
            $newDish = new Dish();
            $newDish->restaurant_id = $dish['restaurant_id'];
            $newDish->name = $dish['name'];
            $newDish->description = $dish['description'];
            $newDish->ingredients = $dish['ingredients'];
            $newDish->price = $dish['price'];
            $newDish->image_path = $dish['image_path'];
            $newDish->visible = $dish['visible'];
            $newDish->vegetarian = $dish['vegetarian'];
            $newDish->vegan = $dish['vegan'];


            $newDish->save();
        }
    }
}

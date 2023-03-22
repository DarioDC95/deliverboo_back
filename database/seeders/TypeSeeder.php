<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Italiano',
            'Giapponese',
            'Cinese',
            'Messicano',
            'Pizzeria',
            'Poké',
            'Hamburger',
            'Kebab',
            'Greco',
            'Indiano',
            'Turco',
            'BBQ',
            'Africano',
            'Fast food'
        ];

        foreach ($types as $key => $value) {
            $newType = new Type();

            $newType->name = $value;

            $newType->save();
        }
    }
}

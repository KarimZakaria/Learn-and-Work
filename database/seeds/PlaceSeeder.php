<?php

use Illuminate\Database\Seeder;
use App\Place;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Place::create([
            'location' => 'Giza , Cario'
        ]);

        Place::create([
            'location' => 'Sidi Jaber , Alex'
        ]);

        Place::create([
            'location' => 'Elmontazah , Port Said'
        ]);

        Place::create([
            'location' => 'Daqhaliya'
        ]);

        Place::create([
            'location' => 'Doqqi'
        ]);

        Place::create([
            'location' => 'Sharqyia'
        ]);
    }
}

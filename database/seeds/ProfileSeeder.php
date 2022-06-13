<?php

use Illuminate\Database\Seeder;
use App\Profile; 

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i <= 2 ; $i++)
        { 
            Profile::create([
                'user_id' => $i,
                'information' => 'Authed User',
                
            ]);
        }
    }
}

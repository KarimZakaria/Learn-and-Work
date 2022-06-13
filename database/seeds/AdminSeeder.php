<?php

use Illuminate\Database\Seeder;
use App\Admin ;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'username' => 'Karim Zakaria' ,
            'email' => 'karimzakaria345@gmail.com' ,
            'password' => bcrypt('123456'),
        ]);

        Admin::create([
            'username' => 'Aya Mohamed ' ,
            'email' => 'Aya74@gmail.com' ,
            'password' => bcrypt('123456'),
        ]);
    }
}

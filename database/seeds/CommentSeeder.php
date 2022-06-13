<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
            'comment' => 'comment 1' , 
            'image' => '1.jpg'
        ]);

        Comment::create([
            'comment' => 'comment 2' , 
            'image' => '2.jpg'
        ]);

        Comment::create([
            'comment' => 'comment 3' , 
            'image' => '3.jpg'
        ]);
    }
}

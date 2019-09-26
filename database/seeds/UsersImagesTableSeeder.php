<?php

use Illuminate\Database\Seeder;

class UsersImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UserImage::class, 90)->create();
    }
}

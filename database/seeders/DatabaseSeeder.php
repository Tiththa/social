<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory()->count(15)->create()->each(function ($user) {
             Post::factory()->count(2)->create([
                'user_id' => $user->id
             ]);
         });


    }
}

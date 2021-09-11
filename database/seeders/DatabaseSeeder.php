<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'username' => 'Admin',
            'name' => 'Admin',
            'password' => Hash::make('\2\r&Gep6&8A;49K'),
            'user_type' => 'isAdmin'
        ]);

         User::factory()->count(15)->create();




    }
}

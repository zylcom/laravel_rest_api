<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'name' => 'No Name',
            'email' => 'no@name.com',
            'password' => bcrypt('SangatAmatRahasia'),
        ]);

        Category::create([
            'name' => 'Web Programming',
            'user_id' => 1,
        ]);

        Category::create([
            'name' => 'Vlog',
            'user_id' => 1,
        ]);

        Category::create([
            'name' => 'Life Style',
            'user_id' => 1,
        ]);

        Post::factory(20)->create();
    }
}

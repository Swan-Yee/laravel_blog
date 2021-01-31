<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Seeder;
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
            'name'=>'User',
            'email'=>'user@gmail.com',
            'password'=>Hash::make('password'),
            'image'=>'image/default.png',
        ]);

        Language::create([
            'name'=>'PHP',
            'slug'=>'PHP',
        ]);

        Language::create([
            'name'=>'Laravel',
            'slug'=>'Laravel',
        ]);

        Language::create([
            'name'=>'JavaScript',
            'slug'=>'JavaScript',
        ]);

        Category::create([
            'slug'=>'web-design',
            'name'=>'web-design'
        ]);

        Category::create([
            'slug'=>'web-development',
            'name'=>'web-development'
        ]);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'testUser',
            'gender' => 'male',
            'age' => 20,
            'password' => Hash::make('12345')
        ]);

        \App\Models\Blog::create([
            'title' => 'test title',
            'text' => 'test for version',
            'user_id' => 1
        ]);

        Tag::create(['blog_id'=>1,'name'=>'testBlog']);


        // \App\Models\Blog::find(1)->comments()->create(['text'=>'test comment']);
    }
}

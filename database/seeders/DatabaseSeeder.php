<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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

        // User::Create([
        //     'name' => 'Wiria Ashen',
        //     'email' => 'wiriaashen124@gmail.com',
        //     'password' => bcrypt('12345')

        // ]);

        // User::Create([
        //     'name' => 'userss',
        //     'email' => 'userss4@gmail.com',
        //     'password' => bcrypt('54321')

        // ]);
        User::factory(3)->create();

        Category::Create([
            'name' => 'Web Programing',
            'slug'=> 'web-programming'
        ]);

        Category::Create([
            'name' => 'Personal',
            'slug'=> 'personal'
        ]);

        Post::factory(10)->create();

        // Post::Create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'except' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, ducimus consequuntur! Fuga explicabo minus pariatur perferendis suscipit',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, ducimus consequuntur! Fuga explicabo minus pariatur perferendis suscipit sequi tempore cumque facilis necessitatibus amet, earum eius, dolorem porro deserunt eligendi facere ipsa hic ducimus laborum corrupti?',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::Create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'except' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, ducimus consequuntur! Fuga explicabo minus pariatur perferendis suscipit',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, ducimus consequuntur! Fuga explicabo minus pariatur perferendis suscipit sequi tempore cumque facilis necessitatibus amet, earum eius, dolorem porro deserunt eligendi facere ipsa hic ducimus laborum corrupti?',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::Create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'except' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, ducimus consequuntur! Fuga explicabo minus pariatur perferendis suscipit',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, ducimus consequuntur! Fuga explicabo minus pariatur perferendis suscipit sequi tempore cumque facilis necessitatibus amet, earum eius, dolorem porro deserunt eligendi facere ipsa hic ducimus laborum corrupti?',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::Create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'except' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, ducimus consequuntur! Fuga explicabo minus pariatur perferendis suscipit',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, ducimus consequuntur! Fuga explicabo minus pariatur perferendis suscipit sequi tempore cumque facilis necessitatibus amet, earum eius, dolorem porro deserunt eligendi facere ipsa hic ducimus laborum corrupti?',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);


    }
}

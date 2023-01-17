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


        User::Create([
            'username' => 'usedemo1',
            'name' => 'Roy Aldo',
            'email' => 'roy@roy.com',
            'password' => bcrypt('123123'),
            'is_admin' => 1,
        ]);


        // User::Create([
        //     'username' => 'usedemo2',
        //     'name' => 'Rando',
        //     'email' => 'rando@rando.com',
        //     'password' => bcrypt('123123')
        // ]);



        // Post::Create([
        //     'title' => 'Judul Satu',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'slug' => 'judul-satu',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto,',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto, quidem! Pariatur illum magnam quod veniam veritatis porro beatae doloribus sapiente fugiat aut, culpa reprehenderit, distinctio voluptatem! Nulla mollitia excepturi porro.'
        // ]);

        // Post::Create([
        //     'title' => 'Judul Dua',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'slug' => 'judul-dua',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto,',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto, quidem! Pariatur illum magnam quod veniam veritatis porro beatae doloribus sapiente fugiat aut, culpa reprehenderit, distinctio voluptatem! Nulla mollitia excepturi porro.'
        // ]);

        // Post::Create([
        //     'title' => 'Judul Tiga',
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'slug' => 'judul-tiga',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto,',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto, quidem! Pariatur illum magnam quod veniam veritatis porro beatae doloribus sapiente fugiat aut, culpa reprehenderit, distinctio voluptatem! Nulla mollitia excepturi porro.'
        // ]);
        // Post::Create([
        //     'title' => 'Judul Empat',
        //     'category_id' => 2,
        //     'user_id' => 2,
        //     'slug' => 'judul-empat',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto,',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto, quidem! Pariatur illum magnam quod veniam veritatis porro beatae doloribus sapiente fugiat aut, culpa reprehenderit, distinctio voluptatem! Nulla mollitia excepturi porro.'
        // ]);

        User::factory(3)->create();
        Post::Factory(20)->create();

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
    }
}

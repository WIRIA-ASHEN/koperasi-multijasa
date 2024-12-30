<?php

namespace App\Models;


class Post 
{
    private static $blog_posts = [
        [
            "title" => "Judul Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Wiria Ashen",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque cum dicta labore facere, rerum asperiores repellat, mollitia minima tempore veritatis esse sunt molestiae qui quis fugit optio. Laboriosam iste perspiciatis sit eligendi fuga dolores, minus optio debitis facilis, repellat nesciunt laborum aut quaerat id cumque maxime? Eius cum adipisci sit ipsa obcaecati delectus consequatur nostrum culpa sequi ea ipsum modi voluptatum dicta iure, omnis molestias sapiente maxime fugiat neque. Eum perspiciatis modi at ut illum expedita id eaque voluptates iste."
        ],
        [
            "title" => "Judul Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Yahahhaha",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque cum dicta labore facere, rerum asperiores repellat, mollitia minima tempore veritatis esse sunt molestiae qui quis fugit optio. Laboriosam iste perspiciatis sit eligendi fuga dolores, minus optio debitis facilis, repellat nesciunt laborum aut quaerat id cumque maxime? Eius cum adipisci sit ipsa obcaecati delectus consequatur nostrum culpa sequi ea ipsum modi voluptatum dicta iure, omnis molestias sapiente maxime fugiat neque. Eum perspiciatis modi at ut illum expedita id eaque voluptates iste."
        ]
        ]; 

        public static function all()
        {
            return collect(self::$blog_posts);
        }

        public static function find($slug)
        {
            $posts = static::all();
            // $post = [];
            // foreach($posts as $p) {
            //     if($p["slug"] === $slug){
            //     $post = $p;
            //     }
            // }
            return $posts->firstwhere('slug',$slug);
        }
}



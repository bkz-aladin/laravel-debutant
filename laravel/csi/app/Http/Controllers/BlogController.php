<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class BlogController extends Controller
{

    //@foreach
    //{{ $data['titre'] }}
    //@if @elseif @else @endif

    public function displayArticle(){


        $data = array(
            "titre"         => "Laravel c'est bien ! ",
            "description"   => "Laravel c'est mieux",
            "image"         => "https://i0.wp.com/wp.laravel-news.com/wp-content/uploads/2018/03/signed-routes.png?resize=2200%2C1125",
            "tags"          => ["dev", "laravel", "framework"],
            "is_published"  => true
        );

        return view("blog.article")->with('data', $data);
    }
}

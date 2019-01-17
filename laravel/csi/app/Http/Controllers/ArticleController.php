<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ArticleController extends Controller
{
    public function create(){
        $user = Auth::check();


        return view('blog.article.create');
    }

    public function store(Request $request){

        //Ajouter un ligne en BDD
        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->content = $request->contenu;
        $article->image = $request->image;

        $article->tags = json_encode(explode(',', $request->tags));

        $article->save();

    }

    public function display($id){
        $article = Article::find($id);

        $data = array(
            'article' => $article
        );

        return view('blog.article.display')->with('data', $data);
    }

    public function delete($id){
       $article = Article::find($id);
       $article->delete();
    }

    public function postByTitle($name){


    }
}

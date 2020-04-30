<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Tag;

use App\Post;

class WelcomeController extends Controller
{
    
    public function index()
    {
      
        $search = request()->query('search');

        if ($search) {

            $posts = Post::where('title','LIKE',"%{$search}%")->simplePaginate(1);

            //dd(request()->query('search'));
        }

        else{
            $posts = Post::simplePaginate(1);
        }


        return view('welcome')
        
        ->with('categories',Category::all())

        ->with('tags',Tag::all())

       // ->with('posts',Post::all());

       ->with('posts',$posts); //if we use simplepaginate in the place of paginate then front end is like next and previous in the place of 1,2,3,... no.

    }




}

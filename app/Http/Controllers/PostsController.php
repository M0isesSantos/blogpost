<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Categorias;

class PostsController extends Controller
{
    public function index(){
        $post = Posts::where('status', 2)->latest('id')->paginate(8);

        return view('posts.index', compact('post'));
    }

    public function show(Posts $post){

       /*  $similares = Posts::where('categoria_id', $post->categoria_id)
        ->where('status', 2)
        ->latest('id')
        ->take(4)
        ->get(); */

        return view('posts.show', compact('post'));
    }


    public function categorias(Categorias $categorias){
        $posts = Posts::where('categoria_id', $categorias->id)
                        ->where('status', 2)
                        ->latest('id')
                        ->paginate(4);

        return view('posts.categorias', compact('posts', 'categorias'));
    }
}

<?php

namespace App\Http\Controllers\web;


use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function blog()
    {
        // $posts = Post::OrderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(10);
        $posts = Post::latest()->where('status', 'PUBLISHED')->paginate(3);

        return view('web.posts', compact('posts'));

    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('web.post', compact('post'));

    }

    public function category($slug)
    {
        //obten la categoria mientras cuyo slug sea igual al slug que estamos recogiendo y recoge unicamente el id.
        $category = Category::where('slug',$slug)->pluck('id')->first();

        $posts = Post::where('category_id', $category)->latest()->where('status', 'PUBLISHED')->paginate(3);

        return view('web.posts', compact('posts'));
    }

    public function tag($slug)
    {
        // whereHas (Que tengan)
        //trae todos los posts que tegan etiquetas y utilizamos query en la funcion anonima para almacenar todos
        // los post que acabamos de traer y en $query->where le decimos que solo muestre los post con la etiqueta que almacenamos en slug
        $posts = Post::whereHas('tags', function($query) use ($slug){
            $query->where('slug', $slug);
        })->latest()->where('status','PUBLISHED')->paginate(3);

        return view('web.posts',compact('posts'));
    }
}

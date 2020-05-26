<?php

namespace App\Http\Controllers\User;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SavePostUserRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $posts = Post::latest()->where('user_id', Auth()->user()->id)->paginate(10);
        return view ('user.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $category = Category::latest()->pluck('name', 'id');
        $tags     = Tag::latest()->get();

        return view('user.posts.create', compact('post','category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestfo
     * @return \Illuminate\Http\Response
     */
    public function store(SavePostUserRequest $request)
    {
        $post  = Post::create($request->validated());

        //image
        if($request->file('file'))
        {
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $post->fill(['file' => asset($path)])->save();
        }
        //TAGS
        $post->tags()->attach($request->get('tags'));

        return redirect()->route('user.posts.index', compact('post'))
        ->with('message', 'Articulo creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('user.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $category   = Category::latest()->pluck('name', 'id');
        $tags       = Tag::latest()->get();

        return view('user.posts.edit', compact('post','category','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SavePostUserRequest $request, Post $post)
    {
        $post->update($request->validated());
        $this->authorize('pass', $post);

        //image
        if($request->file('file')){
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $post->fill(['file' => asset($path)])->save();
        }

        //TAGS
        $post->tags()->sync($request->get('tags'));

        return redirect()->route('posts.index', compact('post'))
        ->with('message', 'Entrada editada éxitosamente');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('user.posts.index')
        ->with('message', 'El articulo ha sido eliminado');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller{

    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        //$posts= Post::all();
        return view('dashboard.post.index', ['posts'=>$posts]);
    }

    public function create(){
        $categorias= Category::all();
        return view('dashboard.post.create', ['post'=>new Post(), 'categories'=>$categorias, 'ifCategorySelected'=>false]);
    }

    public function store(StorePost $request){
        Post::create($request->validated());
        $posts= Post::all();
        return view('dashboard.post.index', ['posts'=>$posts]);
    }

    public function show(Post $post){
        return view('dashboard.post.show', ['post'=>$post]); 
    }

    public function edit(Post $post) {
        $categorias= Category::all();
        return view('dashboard.post.edit', ['post'=>$post, 'categories'=>$categorias, 'ifCategorySelected'=>true]);  
    }

    public function update(StorePost $request, Post $post){
        $post->name=$request->name;
        $post->category_id=$request->category_id;
        $post->description=$request->description; 
        $post->save($request->validated());
        $posts= Post::all();
        return view('dashboard.post.index', ['posts'=>$posts]);
    }

    public function destroy(Post $post){
        $post->delete();
        return back()->with('status', 'Publicación eliminada!');
    }

}

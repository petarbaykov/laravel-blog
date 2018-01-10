<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
class BlogController extends Controller
{
    public function create(){

    	return view('blog.create');
    }

    public function postCreate(Request $request){
    	$post = new Post();
    	$post->title = $request['title'];
    	$post->content = $request['content'];
    	$post->created_at = time();
    	$post->save();

    	return redirect()->back()->with('msg','Статията е добавена успешно');
    }

    public function adminPost(){
    	$posts = Post::all();

    	return view('blog.admin-posts')->with(['posts'=>$posts]);
    }

    public function edit($id){
    	$post = Post::find($id);

    	return view('blog.edit')->with(['post'=>$post]);
    }

    public function postEdit(Request $request){
    	$post = Post::find($request['id']);
    	$post->title = $request['title'];
    	$post->content = $request['content'];

    	$post->save();

    	return redirect()->back()->with('msg','Статията успешно обновена');
    }

    public function delete($id){

    	$post = Post::find($id);
    	$post->delete();

    	return redirect()->back()->with('msg','Статията беше успешно изтрита');
    }
}

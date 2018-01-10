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
}

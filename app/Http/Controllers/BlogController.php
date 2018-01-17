<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use Auth;
use DB;
class BlogController extends Controller
{
    public function create(){

    	return view('blog.create');
    }

    public function postCreate(Request $request){
        $file  = $request->file('image');
        $msg = "Статията ще бъде добавена след преглеждане от админа";
    	$post = new Post();
    	$post->title = $request['title'];
    	$post->content = $request['content'];
    	$post->created_at = time();
        if(Auth::user()->role == "admin"){
            $post->approved = 1;
             $msg = "Статията беше добавена успешно";
        }
        $post->author = Auth::user()->email;
    	$post->save();
       
        $post->update(['image'=> $post->id.'_post.'.$file->getClientOriginalExtension()]);
        $path = 'blog-posts';
        $file->move($path,$post->id.'_post.'.$file->getClientOriginalExtension());

       

    	return redirect()->back()->with('msg',$msg);
    }

    public function adminPost(){
    	
        if(Auth::user()->role == "admin"){
            $posts = Post::all();
        }else if(Auth::user()->role == "author"){
             $posts = Post::where('author',Auth::user()->email)->get();
        }
    	return view('blog.admin-posts')->with(['posts'=>$posts]);
    }

    public function edit($id){
    	$post = Post::find($id);

    	return view('blog.edit')->with(['post'=>$post]);
    }

    public function postEdit(Request $request){
         $file  = $request->file('image');
    	$post = Post::find($request['id']);
    	$post->title = $request['title'];
    	$post->content = $request['content'];

    	$post->save();
        if(isset($_FILES['image'])){
             $post->update(['image'=> $post->id.'_post.'.$file->getClientOriginalExtension()]);
             $path = 'blog-posts';
            $file->move($path,$post->id.'_post.'.$file->getClientOriginalExtension());
        }
        
    	return redirect()->back()->with('msg','Статията успешно обновена');
    }

    public function delete($id){

    	$post = Post::find($id);
    	$post->delete();

    	return redirect()->back()->with('msg','Статията беше успешно изтрита');
    }

    public function posts(){
    	$posts = Post::where('approved',1)->paginate(5);

    	return view('blog.index')->with(['posts'=>$posts,'page'=>'home']);
    }

    public function singlePost($id){
        $post = Post::find($id);
    	$comments = DB::table('comments')
        ->join('users','users.id','=','comments.user_id')
       ->select('comments.comment','comments.user_id','users.email')
       ->where('comments.post_id','=',$id)
       ->get();

    	return view('blog.single')->with(['post'=>$post,'comments'=>$comments]);
    }
}

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
            $posts = Post::orderBy('id','desc')->get();
        }else if(Auth::user()->role == "author"){
             $posts = Post::where('author',Auth::user()->email)->orderBy('id','desc')->get();
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
    	$posts = DB::table('posts')
            ->where('approved',1)
            ->leftJoin('comments','comments.post_id','=','posts.id')
            ->leftJoin('post_likes','posts.id','=','post_likes.post_id')
            ->select('posts.*',DB::raw('count(comments.post_id) as post_comments'),DB::raw('count(post_likes.post_id) as post_likes'))
            ->groupBy('posts.id')
            ->orderBy('posts.id','desc')
            ->paginate(6);
        
    	return view('blog.index')->with(['posts'=>$posts,'page'=>'home']);
    }

    public function singlePost($id){
        $post = Post::find($id);
    	$comments = DB::table('comments')
        ->join('users','users.id','=','comments.user_id')
       ->select('comments.comment','comments.user_id','users.email')
       ->where('comments.post_id','=',$id)
       ->get();
        $post->increment('views');
       $liked = false;
       if(Auth::check()){
            $like =  DB::table('post_likes')->where('post_id',$id)->where('user_id',\Auth::user()->id)->first();
            if($like){
                $liked = true;
            }
       }
      
    	return view('blog.single')->with(['post'=>$post,'comments'=>$comments,'liked'=>$liked]);
    }

    public function likePost(Request $request){

        $request = $request->all();
        $like =  DB::table('post_likes')->where('post_id',$request['post_id'])->where('user_id',\Auth::user()->id)->first();
        if(!$like){
            DB::table('post_likes')
            ->insert(['post_id'=>$request['post_id'],'user_id'=>\Auth::user()->id]);
            return 'ok';
        }
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use App\Post;
class AdminController extends Controller
{
    //


    public function makeAuthors(){
    	$users = DB::table('users')->where('email','!=',Auth::user()->email)->get();
    	
    	return view('admin.users')->with(['users'=>$users]);
    }

    public function makeAuthor($id){
    
    	$user = User::find($id);
    	$msg = "";
    	if($user->role == "author"){
    		$msg = 'Потребител '. $user->email .' беше направен на обикновен потребител';
    		$user->role = "user";
    	}else {
    		$msg = 'Потребител '. $user->email .' беше направен автор в блога';
    		$user->role = "author";
    	}
    	
    	$user->save();

    	return redirect()->back()->with('msg',$msg);
    }

    public function approve($id){
       DB::table('posts')->where('id',$id)->update(['approved'=>1]);

       return redirect()->back()->with('msg','Статията беше одобрена');
    }
}

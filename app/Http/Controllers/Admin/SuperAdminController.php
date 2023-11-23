<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class SuperAdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    // super admin home 
    public function index(){
        
        $posts = Post::where('stage', 1)->orderBy('id', 'desc')->get();
        return view('superAdmin.home', compact('posts'));
    }

    // post publish function
    public function publish($slug){
        
        $post = Post::where('slug', $slug)->first();
        $post->stage = 0;
        $post->save();
        return back();
    }

    // post publish function
    public function inapprove($slug){
        
        $post = Post::where('slug', $slug)->first();
        $post->stage = 2;
        $post->save();
        return back();
    }
}

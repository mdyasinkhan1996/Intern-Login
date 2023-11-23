<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $posts = Post::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('admin.home', compact('posts'));
    }

    // post create function starts here
    public function create(Request $request){
        $validated = $request->validate([
            'title' => 'required|unique:posts',
            'desc' => 'required',
        ]);
        $data = new Post;
        $data->title = $request->title;
        $data->slug = Str::slug($request->title, '-');
        $data->stage = 1;
        $data->user_id = Auth::user()->id;
        $data->desc = $request->desc;
        $data->save();
        return back();
    }

    // post edit function
    public function edit($slug){
        $post = Post::where('slug', $slug)->first();
        return view('admin.postEdit', compact('post'));
    }

    // post create function starts here
    public function update(Request $request, $slug){
        $validated = $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);

        $data = Post::where('slug', $slug)->first();
        $data->title = $request->title;
        $data->slug = Str::slug($request->title, '-');
        $data->stage = 1;
        $data->desc = $request->desc;
        $data->save();
        return redirect()->route('admin.home');
    }
    public function destroy($slug){
        $post = Post::where('slug', $slug)->first();
        $post->delete();
        return back();
    }

}

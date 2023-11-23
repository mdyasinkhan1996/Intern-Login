<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;

class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
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
        $data->desc = $request->desc;
        $data->save();
        return back();
    }
}

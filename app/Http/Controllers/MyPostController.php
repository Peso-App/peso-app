<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class MyPostController extends Controller
{
    public function show()
    {
        $posts = Post::get(); 
        
        return view('mypost', ['posts'=>$posts]);
    }
}

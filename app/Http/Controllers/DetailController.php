<?php

namespace App\Http\Controllers;
use App\Post;

class DetailController extends Controller
{
    public function index($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        return view('detail', compact('post'));
    }
}
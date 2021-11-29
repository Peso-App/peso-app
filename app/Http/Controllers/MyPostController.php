<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class MyPostController extends Controller
{
    public function show()
    {
        $posts = Post::get(); 
        
        return view('mypost/mypost', ['posts'=>$posts]);
    }

    public function showupdate($id)
    {
        $post = Post::find($id);
        return view('mypost/update-mypost', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        Post::where('id', $id)
            ->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);

        return redirect('mypost')->with('status', 'Success Update Posting');
    }
}

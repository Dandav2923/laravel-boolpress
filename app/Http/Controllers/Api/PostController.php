<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);

        return response()->json([
            'response' => true,
            'results' =>  $posts,
        ]);
    }

    public function show($id) 
    {
        $post = Post::find($id);
        if (empty($post)) {
            $post = [];
        }
        return response()->json([
            'response' => true,
            'results' =>  $post,
        ]);
    }

    public function orderBy(Request $request)
    {
        
        $data = $request->all();
        $posts = Post::orderBy($data['orderby'], $data['order'])->get();

        return response()->json([
            'response' => true,
            'results' =>  $posts,
        ]);

    }
}

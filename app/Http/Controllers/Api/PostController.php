<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(9);

        return response()->json([
            'response' => true,
            'results' =>  $posts,
        ]);
    }
    public function indexRandom()
    {
        $posts = Post::inRandomOrder()->paginate(3);
        return response()->json([
            'response' => true,
            'results' =>  $posts
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

}

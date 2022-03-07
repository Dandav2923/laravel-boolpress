<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.posts.index', ['posts'=> $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser()
    {
        $posts = Post::where('user_id', Auth::user()
        ->id)
        ->orderBy('created_at', 'desc')
        ->paginate(20);

        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', ['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(
        [
            'title'=> 'required | max:80',
            'content'=> 'required | max:1000',
            'category_id' => 'exists:App\Category,id'
        ]);

        $data = $request->all();
        $boolpress = new Post();
        $boolpress->slug = $boolpress->createSlug($data['title']);
        $img_path = Storage::put('uploads', $data['image']);
        $data['image'] = $img_path;
        $boolpress->user_id = Auth::id();
        $boolpress->fill($data);
        $boolpress->save();
        return redirect()->route('adminboolpresses.show', $boolpress);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $boolpress)
    {
        $data =['boolpress' => $boolpress];
        return view('admin.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $boolpress)
    {
        if (Auth::user()->id != $boolpress->user_id) {
            abort('403');
        }
        $categories = Category::all();
        return view('admin.posts.edit', ['boolpress' => $boolpress, 'categories'=> $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $boolpress)
    {
        $data = $request->all();
        $boolpress->slug = $boolpress->createSlug($data['title']);
        $updated = $boolpress->update($data);
        return redirect()->route('adminboolpresses.show', $boolpress);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $boolpress)
    {
        $boolpress->delete();
        return redirect()
            ->route('adminboolpresses.index')
            ->with('status', "Hai eliminato correttamente il dato $boolpress->id");
    }
}

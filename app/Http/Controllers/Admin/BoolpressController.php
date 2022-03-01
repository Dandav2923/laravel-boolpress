<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Boolpress;
class BoolpressController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $posts = Boolpress::paginate(10);
        return view('admin.posts.index', ['posts'=> $posts]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
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
            'slug'=> 'required | max:80'
        ]);

        $boolpress = new Boolpress();
        $data = $request->all();
        $boolpress->fill($data);
        $boolpress->save();
        return redirect()->route('admin.posts.show', $boolpress);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function show(Boolpress $boolpress)
    {
        $data =['boopress' => $boolpress];
        return view('admin.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function edit(Boolpress $boolpress)
    {
        return view('admin.posts.edit', ['boolpress' => $boolpress]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boolpress $boolpress)
    {
        $data = $request->all();
        $updated = $boolpress->update($data);
        return redirect()->route('admin.posts.show', $boolpress->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boolpress $boolpress)
    {
        $boolpress->delete();
        return redirect()
            ->route('admin.posts.index')
            ->with('status', "Hai eliminato correttamente il dato $boolpress->id");
    }
}

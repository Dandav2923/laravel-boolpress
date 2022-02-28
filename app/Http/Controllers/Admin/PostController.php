<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Boolpress;
class PostController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function show(Boolpress $boolpress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function edit(Boolpress $boolpress)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boolpress $boolpress)
    {
        //
    }
}

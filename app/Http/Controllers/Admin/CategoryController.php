<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'desc')->paginate(5);

        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', ['categories'=> $categories]);
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', ['category' => $category]);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category'=> $category]);
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->all();
        $category->slug = $category->createSlug($data['name']);
        $updated = $category->update($data);
        return redirect()->route('admincategories.show', $category);
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()
            ->route('admincategories.index')
            ->with('status', "Hai eliminato correttamente il dato $category->id");
    }
}
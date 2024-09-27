<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view("admin.Category.Category-index", compact('category'));
    }

    public function create()
    {
        return view('admin.Category.Category-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'color' => 'required',
        ]);


        Category::create($request->all());
        return redirect()->route('category.index')->with('success', 'CATEGORIA CREADA.');
    }

    public function edit($category)
    {
        $category = Category::find($category);
        return view('admin.Category.Category-edit', compact('category'));
    }

    public function update(Request $request, $category)
    {
        if (!$category = Category::find($category)) return abort(404);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'color' => 'required',
        ]);

        $category->update($request->only(['name', 'description', 'color']));
        return redirect()->route('category.index')->with('success', 'CATEGORIA MODIFICADA');
    }

    public function destroy($category)
    {
        if (!$category = Category::find($category)) return abort(404);
       
        $category->delete();
        return redirect()->route('category.index')->with('success', 'CATEGORIA ELIMINADA');
    }
}

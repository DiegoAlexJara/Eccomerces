<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {   
        $category = Category::all();
        $subcategory = SubCategory::paginate(15);
        return view('admin.SubCategory.SubCategory-index', compact('subcategory'));
    }

    public function create()
    {

        $category = Category::all();
        return view('admin.SubCategory.SubCategory-create', compact('category'));

    }

    public function store(Request $request)
    {     
        $request->validate([
            'Name' => 'required',
            'description' => ['required', 'min:10', 'max:200'],
            'color' => 'required',
            'category_id' => 'required',
        ]);
        
        SubCategory::create($request->all());
        return redirect()->route('subcategorias.index')->with('success', 'SubCategoria Creada.');
    }

    public function edit($subcategory)
    {
        $category = Category::all();
        $subcategory = SubCategory::find($subcategory);
        return view('admin.SubCategory.SubCategory-edit', compact('subcategory', 'category'));

    }

    public function update(Request $request, $subcategory)
    {

        if (!$subcategory = SubCategory::find($subcategory)) return abort(404);
        $request->validate([
            'Name' => 'required',
            'description' => 'required',
            'color' => 'required',
            'category_id' => 'required',
        ]);

        $subcategory->update($request->only(['Name', 'description', 'color', 'category_id']));
        return redirect()->route('subcategorias.index')->with('success', 'SubCategoria Modificada');

    }

    public function destroy($subcategory)
    {

        $subcategory = SubCategory::find($subcategory);
        $subcategory->delete();
        return redirect()->route('subcategorias.index')->with('success', 'SubCategoria Eliminada');
        
    }

}

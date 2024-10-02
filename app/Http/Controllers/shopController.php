<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Marca;
use App\Models\Productos;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function marca()
    {
        $marcas = Marca::all();
        return view('user.Marca', compact('marcas'));
    }
    public function marca_shop(String $name, Request $request)
    {

        if (!empty($name)) {
            $marca = Marca::where('name', $name)->first();
        } else {
            // Maneja el caso en que $name esté vacío
            return redirect()->route('marcas');
        }
        $query = $request->input('query');
        $products = Productos::where('name', 'like', "%$query%")
            ->where('marca_id', $marca->id)
            ->paginate(20);

        return view('user.Marca-view', compact('name', 'products', 'marca'));
    }
    public function category()
    {
        $category = Category::all();
        return view('user.Categorys.Category', compact('category'));
    }
    public function category_shop(string $name, Request $request)
    {
        if (!empty($name)) {
            $category = Category::where('name', $name)->first();
        } else {
            // Maneja el caso en que $name esté vacío
            return redirect()->route('Categorys');
        }
        $query = $request->input('query');
        $products = Productos::where('name', 'like', "%$query%")
            ->where('category_id', $category->id)
            ->paginate(20);

        return view('user.Categorys.category-view', compact('name', 'products', 'category'));
    }
    public function subcategory()
    {
        $subcategory = SubCategory::all();
        return view('user.subCategorys.subcategory', compact('subcategory'));
    }
    public function subcategory_shop(string $name, Request $request)
    {
        if (!empty($name)) {
            $subcategory = subcategory::where('name', $name)->first();
        } else {
            // Maneja el caso en que $name esté vacío
            return redirect()->route('subCategorias');
        }
        $query = $request->input('query');
        $products = Productos::where('subcategory_id', $subcategory->id)
            ->where('name', 'like', "%$query%")
            ->paginate(20);
        return view('user.subCategorys.subcategory-view', compact('name', 'products', 'subcategory'));
    }
    public function productos(Request $request)
    {
        $query = $request->input('query');

        $products = Productos::where('name', 'like', "%$query%")->paginate(20);
        return view('user.productos.productos-view', compact('products'));
    }
}

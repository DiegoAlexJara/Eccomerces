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
    public function marca_shop(String $name)
    {

        if (!empty($name)) {
            $marca = Marca::where('name', $name)->first();
        } else {
            // Maneja el caso en que $name esté vacío
            return redirect()->route('marcas');
        }
    
        
        $products = Productos::where('marca_id', $marca->id)->get();
        // if(!isset($products))return redirect()->route('marcas');
        // return $products;
        return view('user.Marca-view', compact('name', 'products', 'marca'));
    }
    public function category()
    {
        $category = Category::all();
        return view('user.Categorys.Category', compact('category'));
    }
    public function category_shop(string $name)
    {
        if (!empty($name)) {
            $category = Category::where('name', $name)->first();
        } else {
            // Maneja el caso en que $name esté vacío
            return redirect()->route('Categorys');
        }
        $products = Productos::where('category_id', $category->id)->get();
        return view('user.Categorys.category-view', compact('name', 'products', 'category'));
    }
    public function subcategory()
    {
        $subcategory = SubCategory::all();
        return view('user.subCategorys.subcategory', compact('subcategory'));
    }
    public function subcategory_shop(string $name)
    {
        if (!empty($name)) {
            $subcategory = subcategory::where('name', $name)->first();
        } else {
            // Maneja el caso en que $name esté vacío
            return redirect()->route('subCategorias');
        }
        $products = Productos::where('subcategory_id', $subcategory->id)->get();
        return view('user.subCategorys.subcategory-view', compact('name', 'products', 'subcategory'));
    }
    public function productos()
    {
        $products = Productos::all();
        return view('user.productos.productos-view', compact('products'));
    }
}

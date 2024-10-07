<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Marca;
use App\Models\Productos;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    public function index(){
        
        $productos = Productos::paginate(15);
        $subcategory = SubCategory::all();
        $Category = Category::all();
        $Marca = Marca::all();

        return view('admin.Productos.Productos-index', compact('productos', 'subcategory', 'Category', 'Marca'));
    }

    public function create()
    {
        $subcategory = SubCategory::all();
        $Category = Category::all();
        $Marca = Marca::all();
        return view('admin.Productos.Productos-create', compact('subcategory', 'Category', 'Marca'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'marca_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'stock' => 'required',
        ]);
        Productos::create($request->all());
        return redirect()->route('productos.index')->with('success', 'PRODUCTO CREADO');
    }
    public function edit($productos){
        $subcategory = SubCategory::all();
        $Category = Category::all();
        $Marca = Marca::all();
        $productos = Productos::find($productos);
        return view('admin.Productos.Productos-edit', compact('productos', 'Marca', 'Category', 'subcategory'));
    }

    public function update(Request $request, $productos)
    {

        $productos = Productos::find($productos);
        $productos->update($request->all());
        return redirect()->route('productos.index')->with('success', 'PRODUCTO MODIFICADO');

    }

    public function destroy($productos)
    {

        $productos = Productos::find($productos);
        $imagen = $productos->path;
        if ($imagen && Storage::disk('public')->exists($imagen)) {
            Storage::disk('public')->delete($imagen);
        }
        $productos->delete();
        return redirect()->route('productos.index')->with('success', 'PRODUCTO ELIMINADO');
        
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index(){
        
        $marcas = Marca::all();
        return view('admin.Marca.Marca-index', compact('marcas'));

    }
    public function create(){
        return view('admin.Marca.Marca-create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => ['required', 'min:10', 'max:200'],
            'color' => 'required',
        ]);
        Marca::create($request->all());
        return redirect()->route('marca.index')->with('success', 'Marca Creada.');
    }
    
    public function edit($marcas){

        $marcas = Marca::find($marcas);
        return view('admin.Marca.Marca-edit', compact('marcas'));

    }
    public function update(Request $request, $marcas) 
    {
        if(!$marcas = Marca::find($marcas)) return abort(404);
        $request->validate([
            'name' => 'required',
            'description' => ['required', 'min:10', 'max:200'],
            'color' => 'required',
        ]);
        $marcas->update($request->only(['name', 'description', 'color']));
        return redirect()->route('marca.index')->with('success', 'Marca Creada.');


    }

    public function destroy($marcas){

        $marcas = Marca::find($marcas);
        $marcas->delete();
        return redirect()->route('marca.index')->with('success', 'Marca Eliminada');

    }
}

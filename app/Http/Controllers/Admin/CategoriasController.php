<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorias;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categorias::all();

        return view('admin.categorias.index', compact('categorias'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'nombre' => 'required',
        'slug' => 'required|unique:categorias'
       ]);
        /* return $request->all(); */
        $categorias = Categorias::create($request->all());

        return redirect()->route('admin.categorias.edit', $categorias)->with('info', 'La categoria se creo correctamente');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        return view('admin.categorias.show', compact('categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorias $categoria)
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorias  $categoria)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:categorias,slug,$categoria->id"
           ]);

           $categoria->update($request->all());

           return redirect()->route('admin.categorias.index', $categoria)->with('info', 'La categoria se actulizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorias $categoria)
    {
        $categoria->delete();
        return redirect()->route('admin.categorias.index')->with('info', 'La categoria se elimino correctamente');
    }
}


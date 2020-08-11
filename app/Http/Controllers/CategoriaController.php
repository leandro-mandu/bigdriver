<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests\StoreCategoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		    $lista = Categoria::all();//lista todas as categorias cadastradas
        return view('categoria.index', compact('lista'));//retorna a view categoria.index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request, Categoria $categoria)
    public function store(StoreCategoria $request, Categoria $categoria)
    {
      $insert = $categoria->create($request->all());
      if ($insert)
        return redirect()->route('categoria.index')->with('success', 'Categoria inserida com sucesso!');
      return redirect()->back()->with('error', 'Falha ao inserir');
    }
/*
    public function store(Request $request, Categoria $categoria)
    {
      $insert = $categoria->create($request->all());
      if ($insert)
        return redirect()->route('categoria.index')->with('success', 'Categoria inserida com sucesso!');
      return redirect()->back()->with('error', 'Falha ao inserir');
    }
*/


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $categoria = Categoria::findOrFail($id);
      return view('categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function edit($id)
    public function edit($id)
    {
      $categoria = Categoria::findOrFail($id);
      return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, $id)
     {
       $update = Categoria::where('id', $id)->update($request->except('_token', '_method'));
       if ($update)
          return redirect()->route('categoria.index')->with('success', 'Categoria alterada com sucesso!');
       return redirect()->back()->with('error', 'Falha ao alterar');
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         $delete = Categoria::where('id', $id)->delete();
         if ($delete)
           return redirect()->route('categoria.index')->with('success', 'Categoria deletada com sucesso!');
         return redirect()->back()->with('error', 'Falha ao deletar');
     }
}

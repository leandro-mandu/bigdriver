<?php

namespace App\Http\Controllers;

use App\Artigo;
use App\Categoria;
use App\Http\Requests\StoreArtigo;

use Illuminate\Http\Request;

class ArtigoController extends Controller
{




  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('IsAdmin', ['except' => 'index']);
  }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $lista = Artigo::all();
      return view('artigo.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $categorias = Categoria::all();
      return view('artigo.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request, Artigo $artigo)
    public function store(StoreArtigo $request, Artigo $artigo)
    {
      $categoria = Categoria::find($request->categoria_id);
      if (! $categoria )
        return redirect()->back()->with('error', 'Categoria inválida');

      if (! $request->file('image')->isValid() )
        return redirect()->back()->with('error', 'Imagem inválida');

      $name = uniqid(date('HisYmd'));
      $extension = $request->image->extension();
      $nameFile = "{$name}.{$extension}";
//      $uploadPath = public_path('storage/');
      $upload = $request->image->storeAs('artigoFiles', $nameFile);
      if ( !$upload )
        return redirect()->back()->with('error', 'Falha ao fazer upload')->withInput();

      $data = $request->all();
      $data['image'] = $nameFile;
      $insert = $artigo->create($data);
      $insert->image=$nameFile;
      if ($insert)
        return redirect()->route('artigo.index')->with('success', 'Salvo com sucesso!');
      return redirect()->back()->with('error', 'Falha ao inserir');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artigo = Artigo::findOrFail($id);
        return view('artigo.show', compact('artigo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

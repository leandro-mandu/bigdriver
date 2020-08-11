@extends('template')
@section('titulo'){!! 'Artigos - Cadastro' !!} @endsection
@section('conteudo')
<form method="post" action="{{route('artigo.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="categoria_id">Categoria</label>
      <select id="categoria_id" name="categoria_id">
        @foreach($categorias as $item)
          <option value="{{$item->id}}">{{$item->title}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="title">Nome</label>
      <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="keywords">Tags</label>
      <input type="text" name="keywords" id="keywords" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="description">Descrição</label>
      <textarea name="description" id="description" class="form-control" required/></textarea>
    </div>

    <div class="form-group">
      <label for="content">Conteúdo</label>
      <textarea name="content" id="content" class="form-control" required></textarea>
    </div>

    <div class="form-group">
      <label for="image">Imagem</label>
      <input type="file" name="image" id="image" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-warning" id="black">Cadastrar</button>
</form>
@endsection

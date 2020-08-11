@extends('template')
@section('titulo'){!! 'Categorias - Editar' !!} @endsection
@section('conteudo')
<form method="post" action="{{route('categoria.update', $categoria->id)}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {!! method_field('PATCH') !!}
    <div class="form-group">
      <label for="title">Nome</label>
      <input type="text" name="title" id="title" class="form-control" value="{{$categoria->title}}" required>
    </div>

    <div class="form-group">
      <label for="keywords">Tags</label>
      <input type="text" name="keywords" id="keywords" class="form-control" value="{{$categoria->keywords}}" required>
    </div>

    <div class="form-group">
      <label for="description">Descrição</label>
      <textarea name="description" id="description" class="form-control" required>{{$categoria->description}}</textarea>
    </div>

    <button type="submit" class="btn btn-warning" id="black">Salvar</button>
</form>
@endsection

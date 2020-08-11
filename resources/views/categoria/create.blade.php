@extends('template')
@section('titulo'){!! 'Categorias - Cadastro' !!} @endsection
@section('conteudo')
<form method="post" action="{{route('categoria.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
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
      <textarea name="description" id="description" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-warning" id="black">Cadastrar</button>
</form>
@endsection

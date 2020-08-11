@extends('template')
@section('titulo'){!! 'Categorias' !!} @endsection
@section('conteudo')
  @foreach($lista as $item)
    {{$item->id}} | {{$item->title}} - {{$item->description}}<br>
    <a href="{{route('categoria.edit', $item->id)}}">Alterar<i class="fa fa-pencil"></i></a>
    <form style="display: inline-block;" method="POST" action="{{route('categoria.destroy', $item->id)}}"
        onsubmit="return confirm('Confirma exclusão?')">
        {{method_field('DELETE')}}{{ csrf_field() }}
        <button type="submit">Excluir</button>
    </form>
    <hr>
  @endforeach
@endsection

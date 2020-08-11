@extends('template')
@section('titulo'){!! $artigo->title !!} @endsection
@section('keywords'){!! $artigo->keywords !!} @endsection
@section('description'){!! $artigo->description !!} @endsection
@section('conteudo')
<img src="{{ asset('storage/artigoFiles/'.$artigo->image) }}"><br>
<i>({{$artigo->keywords}})</i><br>
{{$artigo->description}}
  <p>
    {{$artigo->content}}
  </p>
@endsection

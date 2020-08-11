@extends('template')
@section('titulo'){!! $categoria->title !!} @endsection
@section('keywords'){!! $categoria->keywords !!} @endsection
@section('description'){!! $categoria->description !!} @endsection
@section('conteudo')
  <i>({{$categoria->keywords}})</i>
  <p>
    {{$categoria->description}}
  </p>
@endsection

@extends('template')
@section('titulo'){!! 'Título da Página' !!} @endsection
@section('conteudo')
<p>Texto da página, texto da página. Texto da página? Testo da página:</p>
<p>Texto da página</p>
<p>Texto da página</p>
<p>Texto da página</p>
<p>e por último, porém mais importante:</p>
<p>Texto da página</p>

@auth
    The user is authenticated...


        <li>{{ Auth::user()->tipo }}</li>

@endauth

@guest
    The user is not authenticated...
@endguest

@endsection

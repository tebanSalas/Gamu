@extends('layouts.navBarApp') 

@section('content')

@if(session()->has('msj'))
  <div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('msj')}}</div>
@endif
@if(session()->has('msj2'))
<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('msj2')}}</div>
@endif

<div class="container">
 
</div>

<div class="container">
    <div class="row">
        <h1 align="center">Bienvenidos a la Escuela Comunal de Musica de Orosi </h1>
        <img src="/img/Logo_EscuelaOrosi.jpg" class="img-responsive" alt="Logo Escuela Comunal de Musica de Orosi" width="500" height="500" >
    </div>
</div>
@endsection

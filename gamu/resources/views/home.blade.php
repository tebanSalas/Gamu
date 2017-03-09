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
    	<div class="form-group">
    		<div class="col-md-2 col-md-offset-10">
				<label >{{ $fecha }} </br> {{ $ciclo->ciclo }}, Año {{ $ciclo->year }}</label>
    		</div>
    	</div>
   
        <h1 align="center">Bienvenidos al Sistema de Administración del Sistema de Escuelas de Música de Paraíso  </h1>
        <img src="/img/logoSEMUSPAR.jpg" alt="Logo Escuela Comunal de Musica de Orosi" class="img-rounded"  width="500" height="500" >
    </div>
    
    	
    
</div>
@endsection

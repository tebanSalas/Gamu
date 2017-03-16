@extends('layouts.navBarApp') 

@section('content')

@if(session()->has('msj'))
	<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('msj')}}</div>
@endif
@if(session()->has('msj2'))
<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('msj2')}}</div>
@endif


<div class="container">
  <div class="row">
		<div class="form-group">
  			<div class="col-md-offset-2 col-md-7" >
  				<input id="nombre" name="nombre" type="text" class="form-control col-md-12"  placeholder="Ingrese un nombre del estudiante a buscar" >
  			</div>
  			<div class="col-md-2" >
  				<input id="btnBuscar" type="submit" class="btn btn-success " value="Buscar">
   			</div>  
   		</div>  
  </div>
</div>
	
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table  class="table table-striped">
		 		<input type="hidden" name="idEstud" id="idEstud">
			 		<thead>
			 			<th>Nombre</th>
			 			<th>Cédula</th>
			 			<th>Teléfono</th>
			 			<th>Contacto de Emergencia</th>
			 			<th>Registar</th>
			 		</thead>
			 		<tbody id="listaEstudiantes">
			 			
			 		</tbody>
		 		
 			</table>
 			
        </div>
    </div>
</div>
 @endsection

 @section('scripts')
   <script src="js/buscaEstudExpediente.js"></script>
@endsection
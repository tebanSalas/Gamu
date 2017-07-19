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
    <form class="form-horizontal"  method="PUT" action="{{ url('/buscarBeca/') }}"">
		<input type="hidden" name="_method" value="PUT">
 		{{ csrf_field() }}

 		<div class="form-group">
		<div class="col-xs-3" >
  			<label class="control-label col-sm-12" for="nombre">Buscar Beca</label>
   		</div>
  		<div class="col-xs-6" >
  			<input type="text" class="form-control col-xs-12" name="nombre" placeholder="Ingrese un nombre" >
  		</div>
  		<div class="col-xs-2" >
  			<input type="submit" class="btn btn-success " value="Buscar">
   		</div>  
   		</div>  
	</form>
  </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-striped">
		 		@if(isset($becas))
			 		<thead>
			 			<th>Nombre</th>
			 			<th>Descuento (%)</th>
			 			<th>Descripción</th>
			 			<th>Editar</th>
			 			<th>Ver</th>
			 		</thead>
			 		<tbody>

			 			@foreach($becas as $bec)
			 			
				 			<tr>
				 				<td>{{ $bec->nombre }}</td>
				 				<td>{{ $bec->descuento }}</td>
				 				<td>{{ $bec->detalle }}</td>
				 				<td>
					 				<a href="becas/{{ $bec->id }}/edit" class="btn btn-info">Editar </a>  
					 			</td>
					 			<td>
					 				<a href="becas/{{ $bec->id }}/" class="btn btn-warning">Ver </a>  
					 			</td>
				 			</tr>
				 			
				 		@endforeach
			 		</tbody>
		 		@endif
 			</table>
 			
        </div>
    </div>
</div>




 	

  @endsection
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
    <form class="form-horizontal"  method="PUT" action="{{ url('/buscarCurso/') }}"">
		<input type="hidden" name="_method" value="PUT">
 		{{ csrf_field() }}

 		<div class="form-group">
		<div class="col-xs-3" >
  			<label class="control-label col-sm-12" for="nombre">Buscar Estudiantes</label>
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
		 		@if(isset($cursos))
			 		<thead>
			 			<th>Nombre</th>
			 			<th>Sigla</th>
			 			<th>Tipo</th>
			 			<th>Editar</th>
			 			<th>Ver</th>
			 		</thead>
			 		<tbody>

			 			@foreach($cursos as $cur)
				 			<tr>
				 				<td>{{ $cur->nombre }}</td>
				 				<td>{{ $cur->sigla }}</td>
				 				<td>{{ $cur->tipo }}</td>
				 				<td>
				 					<a href="cursos/{{ $cur->id }}/edit" class="btn btn-info">Editar </a>  
								</td>
								<td>
				 					<a href="cursos/{{ $cur->id }}/" class="btn btn-warning">Ver </a>  
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
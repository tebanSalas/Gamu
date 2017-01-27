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
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-striped">
		 		@if(isset($usuarios))				
			 		<thead>
			 			<th>Nombre</th>
			 			<th>Email</th>
			 			<th>Editar</th>
			 		</thead>
			 		<tbody>

			 			@foreach($usuarios as $use)
				 			<tr>
				 				<td>{{ $use->name }}</td>
				 				<td>{{ $use->email }}</td>
				 				<td>
					 				<a href="usuarios/{{ $use->id }}/edit" class="btn btn-info">Editar </a>  
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
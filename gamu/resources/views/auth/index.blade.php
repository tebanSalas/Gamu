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
			 			<th>Eliminar</th>
			 		</thead>
			 		<tbody>

			 			@foreach($usuarios as $use)
				 			<tr>
				 				<td>{{ $use->name }}</td>
				 				<td>{{ $use->email }}</td>
				 				<td>
					 				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Eliminar</button>  
					 			</td>
				 			</tr>
				 		@endforeach
			 		</tbody>
		 		@endif
 			</table>
        </div>
    </div>
</div>
<!-- Modal -->
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            
                            <div class="modal-body">
                              <h4>Está seguro que desea eliminar la información de: {{ $use->name}} ?</h4>
                            </div>
                            <div class="modal-footer">
                              <form method="POST" action="{{ route('usuarios.destroy',$use->id) }}">
                                <input type="hidden" name="_method" value="DELETE">
                                  {{ csrf_field() }}
                                <input type="submit" class="btn btn-danger" value="Eliminar">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Volver</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div><!--modal-->



 	

  @endsection
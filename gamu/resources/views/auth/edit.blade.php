 @extends('layouts.navBarApp') 

 @section('content')

<!-- mensajes de sucess y error-->
@if(session()->has('msj'))
  <div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('msj')}}</div>
@endif
@if(session()->has('msj2'))
  <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('msj2')}}</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">Modifique la información que desee.</div>
                <div class="panel-body">


                  <form class="form-horizontal" role="form" method="POST" action="{{ route('usuarios.update',$use->id) }}">
                  <input type="hidden" name="_method" value="PUT">
                    	{{ csrf_field() }}

<!-- Nombre -->                      
            						<div class="form-group">
              						<label class="control-label col-sm-2" for="name">Nombre:</label>
              						<div class="col-sm-10">
                							<input type="text" class="form-control" name="name" placeholder="Ingrese el Nombre" value="{{ $use->name}}" required>
            <!-- validación de nombre -->				
                							@if ($errors->has('use'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('use') }}</strong>
                                  </span>
                              @endif
              						</div>
            						</div>

  <!-- email -->
            						<div class="form-group">
            						  <label class="control-label col-sm-2" for="email">Correo electrónico:</label>
            						  	<div class="col-sm-10"> 
            						    	<input type="text" class="form-control" name="email" placeholder="Correo electronico" value="{{ $use->email}}" required>
            				<!-- validación de email -->		    	
            						    	@if ($errors->has('email'))
                                				<span class="help-block">
                                				    <strong>{{ $errors->first('email') }}</strong>
                                				</span>
                              				@endif
            						 	</div>
            						</div>
  

 
  <!-- boton -->
            						<div class="form-group"> 
              						<div class="col-sm-offset-2 col-sm-10">
                						<button type="submit" class="btn btn-theme">Actualizar</button>
                            			<button align="rigth" type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Eliminar</button>
              						</div>
            						</div>
                      </form>

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


                </div>
            </div>
        </div>
    </div>
</div>
 

 @endsection
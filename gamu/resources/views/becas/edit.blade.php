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


                  <form class="form-horizontal" role="form" method="POST" action="{{ route('becas.update',$beca->id) }}">
                  <input type="hidden" name="_method" value="PUT">
                    	{{ csrf_field() }}

<!-- Nombre -->                      
            						<div class="form-group">
              						<label class="control-label col-xs-2" for="nombre">Nombre:</label>
              						<div class="col-xs-10">
                							<input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre" value="{{ $beca->nombre}}" maxlength="60" required>
            <!-- validación de nombre -->				
                							@if ($errors->has('nombre'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                  </span>
                              @endif
              						</div>
            						</div>

  <!-- Descuento -->
            						<div class="form-group">
            						  <label class="control-label col-xs-2" for="descuento">Descuento:</label>
            						  	<div class="col-xs-10"> 
            						    	<input type="number" min="0" max="100" class="form-control" name="descuento" placeholder="Porcentaje de descuento" value="{{ $beca->descuento}}" required>
            				<!-- validación de nombre -->		    	
            						    	@if ($errors->has('descuento'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('descuento') }}</strong>
                                </span>
                              @endif
            						 	</div>
            						</div>
  <!-- detalle -->
            						<div class="form-group">
            						  <label class="control-label col-xs-2" for="detalle">Detalles:</label>
            						  	<div class="col-xs-10"> 
            						    	<textarea type="text" class="form-control" name="detalle" placeholder="Indique los requisitos para esta beca" maxlength="499" required>{{ $beca->detalle}}</textarea>
            				<!-- validación de detalle -->
            						    	@if ($errors->has('detalle'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('detalle') }}</strong>
                                </span>
                              @endif
            						 	</div>
            						</div>
  <!-- boton -->
            						<div class="form-group"> 
              						<div class="col-xs-offset-2 col-xs-10">
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
                              <h4>Está seguro que desea eliminar la información de: {{ $beca->nombre}} ?</h4>
                            </div>
                            <div class="modal-footer">
                              <form method="POST" action="{{ route('becas.destroy',$beca->id) }}">
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
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
                <div class="panel-heading">Ingrese la información del instrumento que se le solicita</div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ route('instrumentos.update',$instrumento->id) }}">
                  <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
<!-- Nombre -->
  						    <div class="form-group">
    						    <label class="control-label col-sm-2" for="nombre">Nombre:</label>
    						    <div class="col-sm-10">
      							 <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre" value="{{ $instrumento->nombre}}" required>
      			<!-- validación de nombre -->				
      							   @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                      @endif
    						    </div>
  						    </div>  

<!-- Serie -->
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="serie">Serie:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="serie" placeholder="Ingrese el número de serie del instrumento" value="{{ $instrumento->serie}}" required>
            <!-- validación de serie -->       
                       @if ($errors->has('serie'))
                        <span class="help-block">
                            <strong>{{ $errors->first('serie') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

<!-- marca -->
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="marca">Marca:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="marca" placeholder="Ingrese la marca del instrumento" value="{{ $instrumento->marca}}" required>
            <!-- validación de marca -->       
                       @if ($errors->has('marca'))
                        <span class="help-block">
                            <strong>{{ $errors->first('marca') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

<!-- num_activo-->     
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="num_activo">Número de activo:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="num_activo" placeholder="Ingrese el número de activo" value="{{ $instrumento->num_activo}}" required>
            <!-- validación de num_activo -->       
                       @if ($errors->has('num_activo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('num_activo') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

<!-- Disponibilidad -->
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="disponibilidad">Disponibilidad:</label>
                      <div class="dropdown col-sm-10">
                        <select class="btn btn-default " name="disponibilidad" >
                        @if($instrumento->disponibilidad === 'Disponible')
                          <option value="Disponible">Disponible</option>
                          <option value="Ocupado">Ocupado</option>
                        @else
                          <option value="Ocupado">Ocupado</option>
                          <option value="Disponible">Disponible</option>
                        @endif
                        
                        <!---->
                      </select>
                    </div>
                  </div>

<!-- estado -->
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="estado">Estado:</label>
                      <div class="dropdown col-sm-10">
                      <select class="btn btn-default" name="estado" >
                        @if($instrumento->estado === 'Excelente')
                          <option value="Excelente" selected>Excelente</option>
                          <option value="Bueno">Bueno</option>
                          <option value="Regular">Regular</option>
                          <option value="Malo">Malo</option>                          
                        @elseif ($instrumento->estado === 'Bueno')
                          <option value="Excelente">Excelente</option>
                          <option value="Bueno" selected>Bueno</option>
                          <option value="Regular">Regular</option>
                          <option value="Malo">Malo</option>
                        @elseif ($instrumento->estado === 'Regular')
                          <option value="Excelente">Excelente</option>
                          <option value="Bueno" >Bueno</option>
                          <option value="Regular" selected>Regular</option>
                          <option value="Malo">Malo</option>
                        @elseif ($instrumento->estado === 'Malo')
                          <option value="Excelente">Excelente</option>
                          <option value="Bueno" >Bueno</option>
                          <option value="Regular">Regular</option>
                          <option value="Malo" selected>Malo</option>

                        @endif

                        
                      </select>   
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
                              <h4>Está seguro que desea eliminar la información del instrumento: {{ $instrumento->nombre}} ?</h4>
                            </div>
                            <div class="modal-footer">
                              <form method="POST" action="{{ route('instrumentos.destroy',$instrumento->id) }}">
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
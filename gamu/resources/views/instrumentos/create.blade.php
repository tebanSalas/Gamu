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
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/instrumentos') }}">
                    {{ csrf_field() }}
<!-- Nombre -->
  						    <div class="form-group">
    						    <label class="control-label col-sm-2" for="nombre">Nombre:</label>
    						    <div class="col-sm-10">
      							 <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre" required>
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
                      <input type="text" class="form-control" name="serie" placeholder="Ingrese el número de serie del instrumento" required>
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
                      <input type="text" class="form-control" name="marca" placeholder="Ingrese la marca del instrumento" required>
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
                      <input type="text" class="form-control" name="num_activo" placeholder="Ingrese el número de activo" required>
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
                        <select class="btn btn-default " name="disponibilidad">
                        <option value="Disponible">Disponible</option>
                        <option value="Ocupado">Ocupado</option>
                      </select>
                    </div>
                  </div>

<!-- estado -->
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="estado">Estado:</label>
                      <div class="dropdown col-sm-10">
                        <select class="btn btn-default" name="estado">
                          <option value="Excelente">Excelente</option>
                          <option value="Bueno">Bueno</option>
                          <option value="Regular">Regular</option>
                          <option value="Malo">Malo</option>
                        </select>   
                      </div>
                  </div>



<!-- boton -->
  						    <div class="form-group"> 
    						    <div class="col-sm-offset-2 col-sm-10">
      						    <button type="submit" class="btn btn-theme">Guardar</button>
    						    </div>
  						    </div>

						      </form>
                </div>
            </div>
        </div>
    </div>
</div>
 

 @endsection
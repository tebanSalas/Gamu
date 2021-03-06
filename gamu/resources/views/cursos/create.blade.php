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
                <div class="panel-heading">Ingrese la información del curso que se le solicita</div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/cursos') }}">
                    {{ csrf_field() }}
<!-- Nombre -->
  						    <div class="form-group">
    						    <label class="control-label col-xs-2" for="nombre">Nombre:</label>
    						    <div class="col-xs-10">
      							 <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre" maxlength="60" required>
      			<!-- validación de nombre -->				
      							   @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                      @endif
    						    </div>
  						    </div>  

<!-- Sigla -->         
                  <div class="form-group">
                    <label class="control-label col-xs-2" for="sigla">Sigla:</label>
                    <div class="col-xs-10">
                      <input type="text" class="form-control" name="sigla" placeholder="Ingrese la sigla del curso" maxlength="60" required>
            <!-- validación de sigla -->       
                       @if ($errors->has('sigla'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sigla') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

<!-- tipo -->         
                  <div class="form-group">
                    <label class="control-label col-xs-2" for="tipo">Tipo de curso:</label>
                      <div class="dropdown col-xs-10">
                        <select class="btn btn-default " name="tipo">
                        <option value="Teoricos">Teóricos</option>
                        <option value="Instrumento">Instrumento</option>
                        <option value="Taller">Taller</option>
                      </select>
                    </div>
                  </div>


<!-- boton -->
  						    <div class="form-group"> 
    						    <div class="col-xs-offset-2 col-xs-10">
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
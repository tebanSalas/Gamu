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

<!-- Sigla -->         
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="sigla">Sigla:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="sigla" placeholder="Ingrese la sigla del curso" required>
            <!-- validación de sigla -->       
                       @if ($errors->has('sigla'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sigla') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

<!-- Cupo -->        
              <div class="form-group">
                <label class="control-label col-sm-2" for="cupo">Cupo:</label>
                  <div class="col-sm-10"> 
                    <input type="number" min="1" max="100" class="form-control" name="cupo" placeholder="Indique la cantidad de cupos para este curso" required>
          <!-- validación de nombre -->         
                    @if ($errors->has('cupo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cupo') }}</strong>
                        </span>
                    @endif
                </div>
              </div>


<!-- tipo -->         
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="tipo">Tipo de curso:</label>
                      <div class="dropdown col-sm-10">
                        <select class="btn btn-default " name="tipo">
                        <option value="Teoricos">Teóricos</option>
                        <option value="Instrumento">Instrumento</option>
                        <option value="Taller">Taller</option>
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
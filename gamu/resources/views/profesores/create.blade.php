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
                <div class="panel-heading">Ingrese la información del profesor que se le solicita</div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/profesores') }}">
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

<!-- apellidos -->             
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="apellidos">Apellidos:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="apellidos" placeholder="Ahora los apellidos" required>
            <!-- validación de apellidos -->       
                       @if ($errors->has('apellidos'))
                        <span class="help-block">
                            <strong>{{ $errors->first('apellidos') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

<!-- cedula -->                  
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="cedula">Cédula:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="cedula" placeholder="El número de cédula" required>
            <!-- validación de cedula -->       
                       @if ($errors->has('cedula'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cedula') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

<!-- fecha_nacimiento -->            
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="fecha_nacimiento"  required>
            <!-- validación defecha_nacimientoa -->       
                       @if ($errors->has('fecha_nacimiento'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

<!-- telefono -->            
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="telefono">Teléfono:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="telefono" placeholder="Ingrese un número telefonico donde se pueda localizar" required>
            <!-- validación detelefonoa -->       
                       @if ($errors->has('telefono'))
                        <span class="help-block">
                            <strong>{{ $errors->first('telefono') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
<!-- email -->    
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Correo Electrónico:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="email" placeholder="Ingrese la dirección de correo electrónico" required>
            <!-- validación detelefonoa -->       
                       @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

<!-- especialidad -->                 
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="especialidad">Especialidad:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="especialidad" placeholder="¿Cuál es la especialidad?" required>
            <!-- validación detelefonoa -->       
                       @if ($errors->has('especialidad'))
                        <span class="help-block">
                            <strong>{{ $errors->first('especialidad') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
<!-- sueldo -->               
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="sueldo">Sueldo:</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="sueldo" min="1" max="10000000" placeholder="¿de cuanto hablamos?" required>
            <!-- validación detelefonoa -->       
                       @if ($errors->has('sueldo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sueldo') }}</strong>
                        </span>
                      @endif
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
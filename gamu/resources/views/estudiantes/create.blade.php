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
                <div class="panel-heading">Ingrese la información del estudiante que se le solicita</div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/estudiantes') }}">
                    {{ csrf_field() }}
<!-- Nombre -->
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                    <div class="col-sm-10">
                     <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre" maxlength="60" required>
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
                      <input type="text" class="form-control" name="apellidos" placeholder="Ahora los apellidos" maxlength="60" required>
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
                      <input type="text" class="form-control" name="cedula" placeholder="El número de cédula (sin guiones)" maxlength="10" required>
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
                      <input type="number" class="form-control" name="telefono" placeholder="Ingrese un número telefonico donde se pueda localizar" min="0" max="1000000000" required>
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
                      <input type="email" class="form-control" name="email" placeholder="Ingrese la dirección de correo electrónico" maxlength="60" required>
            <!-- validación detelefonoa -->       
                       @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

<!-- sede -->      
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="sede">Sede:</label>
                    <div class="col-sm-10">
                      <select class="btn btn-default" name="sede" required>
                        <option value="Paraiso">Paraíso</option>
                        <option value="Llanos de Santa Lucia">Llanos de Santa Lucia</option>
                        <option value="Orosi">Orosi</option>
                        <option value="Santiago">Santiago</option>
                      </select>
            <!-- validación detelefonoa -->       
                       @if ($errors->has('sede'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sede') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

<!--beca-->         
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="id_beca">Beca:</label>
                      <div class="dropdown col-sm-10">
                        <select class="btn btn-default" name="id_beca" >
                        @foreach ($becas as $bec)
                          @if($bec->delete == 0)
                            <option value="{{ $bec->id }}">{{ $bec->nombre }}</option>
                          @endif
                        @endforeach
                          </select>
                            <a href="#" data-toggle="popover" title="Información sobre las becas" data-content="Si aún no sabe que beca asignar, seleccione la opción (Beca 0). Puede camniar la categorias de baca al estudiante en cualquier momento en la pestaña de Becas, asignar">¿No sabe que asignar?</a>
                      </div>
                  </div>

<!-- información en caso de emergemcia --> 
                  <div class="form-group">
                    <label class="control-label col-sm-9"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Información del contacto de emergencia:</label> <br>
                  </div> 
<!-- Nombre -->             
                  <div class="form-group">
                  
                    <label class="control-label col-sm-2" for="nombre_padre1">Nombre Padre/Madre:</label>
                    <div class="col-sm-10">
                     <input type="text" class="form-control" name="nombre_padre1" placeholder="Ingrese el Nombre" maxlength="60" required>
            <!-- validación de nombre_padre -->       
                       @if ($errors->has('nombre_padre1'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre_padre1') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>  
<!-- tel_padre -->              
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="tel_padre1">Teléfono:</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="tel_padre1" placeholder="Ingrese un número telefonico donde se pueda localizar" min="0" max="1000000000" required>
            <!-- validación detelefonoa -->       
                       @if ($errors->has('tel_padre1'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tel_padre1') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
<!-- email_emergencia -->    
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="email_emergencia">Correo Electrónico:</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email_emergencia" placeholder="Ingrese la dirección de correo electrónico" maxlength="60" required>
            <!-- validación email_emergencia-->       
                       @if ($errors->has('email_emergencia'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email_emergencia') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
<!-- información en caso de emergemcia -->
                  <div class="form-group">
                    <label class="control-label col-sm-10"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Un contacto más, para poder contactarlos más rápidamente</label> <br>
                  </div> 
<!-- Nombre -->             
                  <div class="form-group">
                  
                    <label class="control-label col-sm-2" for="nombre_padre2">Nombre :</label>
                    <div class="col-sm-10">
                     <input type="text" class="form-control" name="nombre_padre2" placeholder="Ingrese el Nombre" maxlength="60">
            
                    </div>
                  </div>  
<!-- tel_padre -->              
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="tel_padre2">Teléfono:</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="tel_padre2" placeholder="Ingrese un número telefonico donde se pueda localizar" min="0" max="1000000000"> 
            
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

  @section('scripts')
   <script src="/js/pop.js"></script>
  @endsection
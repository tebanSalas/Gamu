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
                <div class="panel-heading">Modifique la información que desee</div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ route('cursos.update',$curso->id) }}">
                  <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
<!-- Nombre -->
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                    <div class="col-sm-10">
                     <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre" value="{{ $curso->nombre}}" required>
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
                      <input type="text" class="form-control" name="sigla" placeholder="Ingrese la sigla del curso" value="{{ $curso->sigla}}" required>
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
                        <input type="number" min="1" max="100" class="form-control" name="cupo" placeholder="Indique la     cantidad de cupos para este curso" value="{{ $curso->cupo}}" required>
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
                      @if($curso->tipo === 'Teoricos')
                        <option value="Teoricos" selected>Teóricos</option>
                        <option value="Instrumento" >Instrumento</option>
                        <option value="Taller">Taller</option>
                      @elseif($curso->tipo === 'Instrumento')
                        <option value="Teoricos" >Teóricos</option>
                        <option value="Instrumento" selected>Instrumento</option>
                        <option value="Taller">Taller</option>
                        @else
                          <option value="Teoricos" >Teóricos</option>
                          <option value="Instrumento" >Instrumento</option>
                          <option value="Taller" selected>Taller</option>
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
                              <h4>Está seguro que desea eliminar la información del curso: {{ $curso->nombre}} ?</h4>
                            </div>
                            <div class="modal-footer">
                              <form method="POST" action="{{ route('cursos.destroy',$curso->id) }}">
                                <input type="hidden" name="_method" value="DELETE">
                                  {{ csrf_field() }}
                                <input type="submit" class="btn btn-danger" value="Eliminar">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                              </form>
                              
                            </div>
                          </div>
                          
                        </div>
                      </div>



                </div>
            </div>
        </div>
    </div>
</div>
 

 @endsection
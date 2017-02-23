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
                <div class="panel-heading">Seleccione el estudiante, seguidamente la beca que le asiganará al mismo</div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('../AsignarBeca') }}">
                  
                    {{ csrf_field() }}
<!-- cursos -->
                    <div class="form-group">
                      <div class="col-md-2" >
                        <label  class="control-label col-sm-2" >Estudiante</label>
                      </div>
                      <div class="col-md-8" >
                        <select id="estudiantes" class="btn btn-default col-md-12" name="estudiantes" >
                        @foreach ($estud as $est)
                          <option value="{{ $est->id }}" >{{ $est->nombre }} {{ $est->apellidos }}</option> 
                        @endforeach
                        </select>
                      </div>
                      <div class="col-md-2" >
                        <button type="button" class="btn btn-warning col-md-10" data-toggle="modal" data-target="#estud">Buscar</button>
                      </div>
                      </div>

<!-- Beca -->
                    <div class="form-group">
                      <div class="col-md-2" >
                        <label class="control-label col-sm-2" for="nombre">Beca</label>
                      </div>

                      <div class="col-md-8" >
                       <select id="becas" class="btn btn-default col-md-12" name="becas" >
                        @foreach ($becas as $bec)
                          <option value="{{ $bec->id }}"> {{ $bec->nombre }}</option> 
                        @endforeach
                        </select>
                      </div>
                      
                    </div>

<!-- Boton -->
                      <div class="form-group"> 
                        <div class="col-md-offset-10 col-md-2">
                           <button type="submit" class="btn btn-theme">Asignar</button>
                        </div>
                      </div>

                  </form>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal Estudiante-->
        <div id="estud" class="modal fade" role="dialog">
          <div class="modal-dialog">
<!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ingrese el nombre del estudiante que desea:</h4>
              </div>
             <div class="modal-body">
                  <input type="hidden" name="_method" value="{{ csrf_token() }}"> 
                  <input type="text" class="form-control" name="nombreE" id="nombreE" placeholder="Ingrese el nombre">
              </div>
              <div class="modal-footer">
                <a href="#" id="btnBuscarEstud" class="btn btn-success" data-dismiss="modal">Buscar</a>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Vover</button>
              </div>
            </div>
          </div>
        </div>

  

 @endsection

 @section('scripts')
   <script src="js/buscarEstudiantes.js"></script>
@endsection
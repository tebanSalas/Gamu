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
            <div class="panel panel-default">
                <div class="panel-heading">
                	<label class="control-label" >Seleccione el curso que desea habilitar en el presente ciclo lectivo, seguidamente escoja el profesor que impartirá el curso y asígnele un horario.</label>
                </div>
                <div class="panel-body">

                	<form class="form-horizontal" role="form" method="POST" action="{{ url('/habilitarCursos')}}">
                  
                    {{ csrf_field() }}
<!-- Curso -->
					<div class="form-group">
                      <div class="col-md-2" >
                        <label  class="control-label col-sm-2" >Cursos</label>
                      </div>
                      <div class="col-md-8" >
                        <select id="cursos" class="btn btn-default col-md-12" name="cursos" >
                        @foreach ($curso as $cur)
                          <option value="{{ $cur->id }}" >{{ $cur->nombre }} - {{ $cur->sigla }}</option> 
                        @endforeach
                        </select>
                      </div>
                      <div class="col-md-2" >
                        <button type="button" class="btn btn-warning col-md-10" data-toggle="modal" data-target="#modalCurso">Buscar</button>
                      </div>
                      </div>

<!-- profesores -->
					<div class="form-group">
                      <div class="col-md-2" >
                        <label  class="control-label col-sm-2" >Profesores:</label>
                      </div>
                      <div class="col-md-8" >
                        <select id="profesores" class="btn btn-default col-md-12" name="profesores" >
                        @foreach ($profes as $prof)
                          <option value="{{ $prof->id }}" >{{ $prof->nombre }} {{ $prof->apellidos }}</option> 
                        @endforeach
                        </select>
                      </div>
                      <div class="col-md-2" >
                        <button type="button" class="btn btn-warning col-md-10" data-toggle="modal" data-target="#modalProfe">Buscar</button>
                      </div>
                    </div>
 <!-- Horario -->
					<div class="form-group">
                      <div class="col-md-2" >
                        <label  class="control-label col-sm-2" >Horario</label>
                      </div>
                      <div class="col-md-8" >
                        <textarea type="text" id="horario" name="horario" class="form-control"></textarea>   
                   
                      </div>
                    </div>
                    
 <!-- ciclo lectivo -->
					<div class="form-group">
                      <div class="col-md-2" >
                        <label  class="control-label col-sm-2" >Ciclo</label>
                      </div>
                      <div class="col-md-8" >
                      @foreach ($ciclo as $cic)
                        <input type="hidden" id="ciclo" name="ciclo" value="{{ $cic->id }}">
                        <input type="text" class="form-control" value="{{ $cic->ciclo }} {{ $cic->year }}" readonly>
                      @endforeach
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

<!-- Modal Curso-->
        <div id="modalCurso" class="modal fade" role="dialog">
          <div class="modal-dialog">
<!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ingrese el nombre del curso a buscar:</h4>
              </div>
             <div class="modal-body">
                  <input type="hidden" name="_method" value="{{ csrf_token() }}"> 
                  <input type="text" class="form-control" name="nombreCurso" id="nombreCurso" placeholder="Ingrese el nombre">
              </div>
              <div class="modal-footer">
                <a href="#" id="btnBuscarCurso" class="btn btn-success" data-dismiss="modal">Buscar</a>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Vover</button>
              </div>
            </div>
          </div>
        </div>

<!-- Modal profes-->
        <div id="modalProfe" class="modal fade" role="dialog">
          <div class="modal-dialog">
<!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ingrese el nombre del profesor a buscar:</h4>
              </div>
             <div class="modal-body">
                  <input type="hidden" name="_method" value="{{ csrf_token() }}"> 
                  <input type="text" class="form-control" name="nombreProfe" id="nombreProfe" placeholder="Ingrese el nombre">
              </div>
              <div class="modal-footer">
                <a href="#" id="btnBuscarProfe" class="btn btn-success" data-dismiss="modal">Buscar</a>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Vover</button>
              </div>
            </div>
          </div>
        </div>	
@endsection

 @section('scripts')
   <script src="js/buscaProfes.js"></script>
   <script src="js/buscaCursos.js"></script>
@endsection
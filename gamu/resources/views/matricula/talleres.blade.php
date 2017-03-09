@extends('layouts.navBarApp') 

 @section('content') 
 

<div id="success" class="alert alert-success fade in" role="alert" style="display:none"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>La matrícula fue registrada con éxito</div>
<div id="error" class="alert alert-danger alert-dismissible" role="alert" style="display:none"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Tuvimos problemas con la matrícula, es probable que el estudiante ya esté matriculado en ese curso, para este ciclo lectivo</div>

<div class="container">
    <div class="row">
    	<div class="col-md-7 col-md-offset-2">
    		<label  id="nomEstudiante" class="control-label"> Cuadro de matricula de talleres para el {{ $ciclo->ciclo }} del año {{ $ciclo->year }}</label> 
            <input type="hidden" id="idCiclo" value="{{ $ciclo->id }}">  
            <input type="hidden" id="token" value="{{ csrf_token() }}">	
    	</div>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading"><label class="control-label" >Matrícula de talleres</label></div>
                <div class="panel-body">
                <form class="form-horizontal">
                   <div class="form-group">
                      <div class="col-md-2" >
                        <label id="ejemplo" class="control-label col-sm-2" >Estudiante</label>
                      </div>
                      <div class="col-md-8" >
                        <select id="estudiantes" class="btn btn-default col-md-12" name="estudiantes" >
                        @foreach ($estud as $est)
                          <option value="{{ $est->id }}" >{{ $est->nombre }} {{ $est->apellidos }}. Ced. {{ $est->cedula }} </option> 
                        @endforeach
                        </select>
                      </div>
                      <div class="col-md-2" >
                        <button type="button" class="btn btn-warning col-md-10" data-toggle="modal" data-target="#estud">Buscar</button>
                      </div>
                    </div>                    
                    
                    <div class="form-group">
                        <div class="col-md-2" >
                            <label id="taller" class="control-label col-sm-2" >Taller</label>
                        </div>
                        <div class="col-md-6" >
                            <select id="M_taller" class="btn btn-default col-md-12" name="M_taller">
                                @foreach ($curProfs as $cp)
                                    @foreach ($cursos as $curso)
                                        @if($curso->id == $cp->id_curso && $curso->tipo == "Taller")
                                            @foreach ($profes as $profe)
                                                @if($profe->id == $cp->id_prof)
                                                    <option value="{{ $cp->id }}">{{ $curso->nombre }} / Profesor: {{ $profe->nombre}} {{ $profe->apellidos }} / Cupos {{ $cp->cupo }}</option>
                                                @endif  
                                            @endforeach 
                                        @endif
                                    @endforeach     
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4" >
                            <textarea id="horarioTA" type="text" class="form-control col-xs-4" placeholder="Seleccione un curso para ver su horario"></textarea>
                        </div>
                    </div>
                </form>
                    <div class="form-group col-md-2">
                        <input type="submit" id="btntaller" class="btn btn-success col-xs-12 " value="Matricular">
                    </div>
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
    <script src="js/matriculaTalleres.js"></script>
@endsection
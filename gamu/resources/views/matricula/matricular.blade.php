@extends('layouts.navBarApp') 

 @section('content')


<div id="success" class="alert alert-success fade in" role="alert" style="display:none"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>La matrícula fue registrada con éxito</div>
<div id="error" class="alert alert-danger alert-dismissible" role="alert" style="display:none"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Tuvimos problemas con la matrícula, es probable que el estudiante ya esté matriculado en ese curso, para este ciclo lectivo</div>

<div class="container">
    <div class="row">
	
    	<div class="col-md-7 col-md-offset-2">
    		<label  id="nomEstudiante" class="control-label"> Cuadro de matricula del estudiante {{ $estudiantes->nombre }} {{ $estudiantes->apellidos }}, para el {{ $ciclo->ciclo }} del año {{ $ciclo->year }}</label> 
    		<input type="hidden" id="idEstudiante" value="{{ $estudiantes->id }}">
            <input type="hidden" id="idCiclo" value="{{ $ciclo->id }}">  	
            <input type="hidden" id="recibo" value="{{ $recibo }}">
            <input type="hidden" id="token" value="{{ csrf_token() }}">	
    	</div>



        <div class="form-group col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading"><label>Matrícula de instrumento</label></div>
                <div class="panel-body">
                	<select id="M_instrumento" class=" btn btn-default col-xs-4" name="M_instrumento">
                		@foreach ($curProfs as $cp)
                        	@foreach ($cursos as $curso)
                        		@if($curso->id == $cp->id_curso && $curso->tipo == "Instrumento")
                        			@foreach ($profes as $profe)
                        				@if($profe->id == $cp->id_prof)
                        					<option value="{{ $cp->id }}">{{ $curso->nombre }} {{ $profe->nombre}} {{ $profe->apellidos }}</option>
                        				@endif	
                        			@endforeach	
                        		@endif
                        	@endforeach		
                        @endforeach
                	</select>
                    <div class="col-xs-6" >
                      <textarea id="horarioI" type="text" class="form-control col-xs-5" placeholder="Seleccione un curso para ver su horario"></textarea>
                    </div>
                    <input type="submit" id="btnInstru" class="btn btn-success col-xs-2" value="Matricular">
                </div>
            </div>
        </div>


        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading"><label class="control-label" >Matrícula de cursos teoricos</label></div>
                <div class="panel-body">
                	<select id="M_teorico" class=" btn btn-default col-xs-4" name="M_teorico">
                		@foreach ($curProfs as $cp)
                        	@foreach ($cursos as $curso)
                        		@if($curso->id == $cp->id_curso && $curso->tipo == "Teoricos")
                        			@foreach ($profes as $profe)
                        				@if($profe->id == $cp->id_prof)
                        					<option value="{{ $cp->id }}">{{ $curso->nombre }} {{ $profe->nombre}} {{ $profe->apellidos }}</option>
                        				@endif	
                        			@endforeach	
                        		@endif
                        	@endforeach		
                        @endforeach
                	</select>
                	<div class="col-xs-6" >
                      <textarea id="horarioTE" type="text" class="form-control col-xs-5" placeholder="Seleccione un curso para ver su horario"></textarea>
                    </div>
                    <input type="submit" id="btnteorico" class="btn btn-success col-xs-2" value="Matricular">
                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading"><label class="control-label" >Matrícula de talleres</label></div>
                <div class="panel-body">
                	<select id="M_taller" class=" btn btn-default col-xs-4" name="M_taller">
                		@foreach ($curProfs as $cp)
                        	@foreach ($cursos as $curso)
                        		@if($curso->id == $cp->id_curso && $curso->tipo == "Taller")
                        			@foreach ($profes as $profe)
                        				@if($profe->id == $cp->id_prof)
                        					<option value="{{ $cp->id }}">{{ $curso->nombre }} {{ $profe->nombre}} {{ $profe->apellidos }}</option>
                        				@endif	
                        			@endforeach	
                        		@endif
                        	@endforeach		
                        @endforeach
                	</select>
                	<div class="col-xs-6" >
                      <textarea id="horarioTA" type="text" class="form-control col-xs-5" placeholder="Seleccione un curso para ver su horario"></textarea>
                    </div>
                    <input type="submit" name="btntaller" class="btn btn-success col-xs-2" value="Matricular">
                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <button onclick="" class="btn btn-theme col-md-12">Concluir Matrícula</button>
        </div>

        <a href="#" data-toggle="popover" data-placement="bottom" title="Informacón para matricular" data-content="La pantalla se encuentra dividida en 3 secciones, Instrumento, teoría, talleres. Para matricular a un estudiante en cualquiera de las áreas disponibles, basta con seleccionar el curso que desee, y presionar el botón “Matricular”. Esta operación es irreversible así que debe de estar muy seguro de la matrícula. Para terminar, presiona el botón “Concluir matrícula”.
        Es muy importante que el estudiante consulte la guia de cursos y horarios">Necesitas ayuda?</a> 
    </div>
</div>


<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script> 


@endsection

 @section('scripts')
   <script src="js/matricula.js"></script>
@endsection
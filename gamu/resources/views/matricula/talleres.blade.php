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
                		<select id="estud" class="btn btn-default col-md-4" name="estud" >
                        	@foreach ($estudiantes as $est)
                          	<option value="{{ $est->id }}" >{{ $est->nombre }} {{ $est->apellidos }}</option>
                        	@endforeach
                    	</select>
                    
                    
                		<select id="M_taller" class="btn btn-default col-md-4" name="M_taller">
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
                	
                	<div class="form-group col-xs-4" >
                      <textarea id="horarioTA" type="text" class="form-control col-xs-4" placeholder="Seleccione un curso para ver su horario"></textarea>
                    </div>
                    <div class="form-group ">
                    	<input type="submit" id="btntaller" class="btn btn-success col-xs-12 " value="Matricular">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection

 @section('scripts')
   <script src="js/matriculaTalleres.js"></script>
@endsection
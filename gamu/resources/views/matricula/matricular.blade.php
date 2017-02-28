@extends('layouts.navBarApp') 

 @section('content')

@if(session()->has('msj'))
	<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('msj')}}</div>
@endif
@if(session()->has('msj2'))
<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('msj2')}}</div>
@endif
<div class="container">
    <div class="row">

    	<div class="col-md-7 col-md-offset-2">
    		<label class="control-label"> Cuadro de matricula del estudiante {{ $estudiantes->nombre }} {{ $estudiantes->apellidos }}, para el {{ $ciclo->ciclo }} del año {{ $ciclo->year }}</label>
    		
    	</div>



        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading"><label class="control-label" >Matrícula de instrumento</label></div>
                <div class="panel-body">
                	<select id="instrumento" class="btn btn-default col-md-6" name="instrumento" >
                        @foreach ($curProfs as $cp)
                        	@foreach ($cursos as $curso)
                        		@if($curso->id == $cp->id_curso && $curso->tipo == "Instrumento")
                        			@foreach ($profes as $profe)
                        				@if($profe->id == $cp->id_prof)
                        					<option value="{{ $cp->id }}">{{ $curso->nombre }} {{ $profe->nombre}} {{ $profe->apellidos }}</option>
                        					<?php
                        					echo "<script> cargaHorario({{ $cp->horario}}) </script>";
                        					?>
                        				@endif	
                        			@endforeach	
                        		@endif
                        	@endforeach		
                        @endforeach
                    </select>
                    <div class="col-md-4" >
                        <textarea type="text" id="horario" name="horario" class="form-control">Horario: </textarea>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading"><label class="control-label" >Matrícula de cursos teoricos</label></div>
                <div class="panel-body">

                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading"><label class="control-label" >Matrícula de talleres</label></div>
                <div class="panel-body">

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

<script>
function cargaHorario(parameter1){
    document.getElementById("horario").innerHTML = parameter1;
}

</script>

@endsection


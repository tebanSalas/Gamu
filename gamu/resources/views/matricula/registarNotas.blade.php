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
    	<div class="col-md-offset-2 col-md-8 ">
    		<label  id="nomEstudiante" class="control-label"> Registro de notas de los cursos matriculados por el estudiante {{ $estudiantes->nombre }} {{ $estudiantes->apellidos }}, para el {{ $ciclo->ciclo }} del año {{ $ciclo->year }}</label>  
        </div>

        <div class="col-md-8 col-md-offset-2">
            
				@foreach ($matriculas as $matri)
					@foreach ($cursos as $cur)
						@if($matri->id_curProf == $cur->id && $matri->id_ciclo == $ciclo->id)
						<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">Curso</div>
							<div class="panel-body">
								<div class="col-xs-4">
									<label ">Curso matriculado:</label>
									<input type="text"  class="form-control" name="curso" value="{{$cur->nameCurso}}" readonly>
								</div>
								<div class="col-xs-4">
									<label >Profesor que lo imparte:</label>
									<input type="text" class="form-control" name="curso" value="{{$cur->nameProf}}{{$cur->apellidosProf}}" readonly>
								</div>
								<div class="col-xs-2">
									<label >Nota:</label>
							<form role="form" method="POST" action="{{ url('/asignarNota') }}">
									<input type="number" class="form-control" name="nota" value="0" >
								</div>
								<div class="col-xs-2">
									
										{{ csrf_field() }}
										<input type="hidden" name="idMatricula" value="{{ $matri->id }}">
										<input type="submit" class="btn btn-success" name="btnRegistro" value="Registrar">
									</form>
									
                    			</div>
							</div>
						</div>
					</div>
						@endif
					
					@endforeach 
				@endforeach                	
                    <div class="col-xs-offset-5 col-xs-2">
                    	<a href="javascript:history.back(-1);"  class="btn btn-warning" title="Ir la página anterior">Volver</a>
                    </div>
                
            
        </div>
	</div>
</div>
 @endsection
<script>
	
</script>
 @section('scripts')
   
@endsection
<!DOCTYPE html> 
<html lang="en">

<head>
<title>Lista de Estudiantes</title>
	<style>
		h2 {
			border-bottom-style: solid;
    		color: #384452;
    		text-align: center;
			}
		div{
			margin: 10px 0px 10px 50px;
		}
		h3{
			color: #384452;
    		text-align: center;
		}
		footer{
			text-align: right;
			width: 100%;
    		bottom: 0;
    		position:fixed;
    		height: 45px
		}
		table {
    		border-collapse: collapse;
    		width: 100%;
		}

		th{
			background-color: #384452;
    		color: white;
			text-align: Center;
    		padding: 10px;
		}
		td {
    		text-align: Center;
    		padding: 10px;
    		border-bottom: 1px solid #384452; 
		}
		tr:nth-child(even){background-color: #FFFFFF}
	</style>

<h2>Sistema de Escuelas de Música de Paraíso</h2>

</head> 

<body>
<h3>Cursos, Profesores y Horarios. </h3>
@if(!empty($cursos))
<table class="table table-striped"> 		
	<thead>
		<tr>
			<th>Curso</th>
			<th>Profesor</th>
			<th>Horario</th>
	</thead>
	<tbody>
		@foreach($cursos as $curso)
			<tr>
				 <td>{{ $curso->cNombre }} / Sigla: {{ $curso->cSigla }}</td>
				 <td>{{ $curso->pNombre }} {{ $curso->pApellidos }}</td>
				 <td>{{ $curso->horario }} Cupos: {{ $curso->cupo }}</td>
			</tr>	
		@endforeach
	</tbody> 		
</table>
@else
<label>No se registraron cursos para este ciclo lectivo, intente registrando uno en la pestaña "Cursos" y luego en "Habilitar Cursos".</label>
@endif
</body>
<footer>
	<div >
  		<label>{{ $fecha }}</label>
	</div>
</footer>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Hojas de Clase</title>
	<style>
		h2 {
			border-bottom-style: solid;
    		color: #384452;
    		text-align: center;
			}
		div{
			margin: 10px 0px 10px 50px;
		}
		label{
			font: arial;
			font-size: 16px;

		}
		#b{
			font-weight: bold;
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
    		margin-bottom: 50px;

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
<h3>Lista de cursos con sus respectivos estudiantes matriculados.</h3>
@if(!empty($cursos))
		@foreach($cursos as $c)
		<label id="b">{{ $c->sigla }} {{ $c->nameCurso }}. Prof. {{ $c->nameProf }} {{ $c->apellidosProf }}</label>
				<table >	 		
					<thead>
						<tr>
							<th>Estudiante</th>
							<th>Cédula</th>
							<th>Contacto</th>
						</tr>
					</thead>
			@foreach($matriculas as $m)
				@if($c->id == $m->id_curProf)	
					<tbody>
						<tr>
				 			<td>{{ $m->nombre}} / {{ $m->apellidos }}</td>
				 			<td>{{ $m->cedula}} </td>
				 			<td>{{ $m->telefono }}</td>
						</tr>				
				@endif
			@endforeach
				</tbody>	 		
				</table>
		@endforeach
@else
	<label id="b">No se registraron matriculas</label>
@endif
</body>
<footer>
	<div >
		<p>Nota: Si la lista de estudiantes para un curso aparece vacía, es porque ningún estudiante matriculo el curso.</p>
  		<label>{{ $fecha }}</label>
	</div>
</footer>
</html>
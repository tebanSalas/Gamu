<!DOCTYPE html>
<html lang="en">

<head>
<title>Informe Matrícula</title>
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
@if(!empty($matricula))
<body>
@foreach($matricula as $m)
	@if($loop->first)	
		<h3>Informe de matricula del estudiante {{ $m->nombre }} {{ $m->apellidos }} Ced.{{ $m->cedula }}. Para el ciclo {{ $m->ciclo }} del {{ $m->year }}</h3>
	@endif		
@endforeach
<table > 		
	<thead>
		<tr>
			<th>Curso</th>
			<th>Profesor</th>
			<th>Horario</th>
	</thead>
	<tbody>
		@foreach($matricula as $m)	
			<tr>
				 <td>{{ $m->cSigla }} / {{ $m->cNombre }}</td>
				 <td>{{ $m->pNombre }} {{ $m->pApellidos }}</td>
				 <td>{{ $m->horario }}</td>
			</tr>
		@endforeach
	</tbody> 		
</table>
@else
	<label id="b">No se registraron matriculas</label>
@endif
</body>
<footer>
	<div >
  		<label>{{ $fecha }}</label>
	</div>
</footer>
</html>
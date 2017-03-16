<!DOCTYPE html>
<html lang="en">

<head>
<title>Expediente Académico</title>
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
<h3>Expediente académico del estudiante {{ $estudiante->nombre }} {{ $estudiante->apellidos }} Ced.{{ $estudiante->cedula }}.</h3>
@if(!empty($matricula))
		@foreach($ciclos as $c)
		<label id="b">{{ $c->ciclo }} del {{ $c->year }}</label>
				<table >	 		
					<thead>
						<tr>
							<th>Curso</th>
							<th>Profesor</th>
							<th>Nota</th>
						</tr>
					</thead>
			@foreach($matricula as $m)
				@if($c->id == $m->id_ciclo)	
					<tbody>
						<tr>
				 			<td>{{ $m->cSigla }} / {{ $m->cNombre }}</td>
				 			<td>{{ $m->pNombre }} {{ $m->pApellidos }}</td>
				 			<td>{{ $m->nota }}</td>
						</tr>	
				@endif
			@endforeach
				</tbody>	 		
				</table>
		@endforeach
@else
	<label id="b">No se registraron cursos matriculados</label>
@endif
</body>
<footer>
	<div >
  		<label>{{ $fecha }}</label>
	</div>
</footer>

</html>
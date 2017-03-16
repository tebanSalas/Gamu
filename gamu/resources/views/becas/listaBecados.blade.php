<!DOCTYPE html>
<html lang="en">

<head>
<title>Lista de Estudiantes Becados</title>
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
	
<h3>Lista de estudiantes becados</h3>

@if(!empty($becados))
	<table >	
	<thead>
		<tr>
			<th>Estudiante</th>
			<th>Beca Asignada</th>		
	</thead>
	<tbody>
		@foreach($becados as $beca)	
			<tr>
				 <td>{{ $beca->nombre }} {{ $beca->apellidos }}. ced: {{ $beca->cedula }}</td>
				 <td>{{ $beca->beca }} Descuento: {{ $beca->descuento }}%</td>
				 		 
			</tr>
		@endforeach
	</tbody>
		 		
</table>	
@else
	<label id="b">No se registraron estudiantes con beca</label>
@endif

</body>
<footer>
	<div >
		<label>{{ $fecha }}</label>
	</div>
</footer>

</html>
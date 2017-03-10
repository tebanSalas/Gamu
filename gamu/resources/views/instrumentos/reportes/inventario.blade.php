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
<h3>Inventario de Instrumentos</h3>

<table class="table table-striped">
		 		
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Serie</th>
			<th>Marca</th>
			<th>Num. Activo</th>
			<th>Estado</th>
			<th>Disponibilidad</th>
	</thead>
	<tbody>

		@foreach($instrumentos as $instru)
			<tr>
				 <td>{{ $instru->nombre }} </td>
				 <td>{{ $instru->serie }}</td>
				 <td>{{ $instru->marca }}</td>
				 <td>{{ $instru->num_activo }}</td>
				 <td>{{ $instru->estado }}</td>
				 <td>{{ $instru->disponibilidad }}</td>
			</tr>	
		@endforeach
	</tbody>
		 		
</table>
</body>

<footer>
	<div >
  		<label>{{ $fecha }}</label>
	</div>
</footer>

</html>
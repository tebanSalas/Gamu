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
		tr:nth-child(even){background-color: #FFFFFF}}
	</style>

<h2>Sistema de Escuelas de Música de Paraíso</h2>

</head> 

<body>
<h3>Listado de Estudiantes</h3>
@if(!empty($estud))
<table class="table table-striped"> 		
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Cédula</th>
			<th>Nacimiento</th>
			<th>Teléfono</th>
			<th>Padre</th>
	</thead>
	<tbody>
		@foreach($estud as $estu)
			@if($estu->delete == 0)	
			<tr>
				 <td>{{ $estu->nombre }} {{ $estu->apellidos }}</td>
				 <td>{{ $estu->cedula }}</td>
				 <td>{{ $estu->fecha_nacimiento }}</td>
				 <td>{{ $estu->telefono }}</td>
				 <td>{{ $estu->nombre_padre1 }} {{ $estu->tel_padre1 }} 
				 </td>
			</tr>
			@endif	
		@endforeach
	</tbody>	 		
</table>
@else
<label>No se registraron estudiantes, intente registar uno en la pestaña "Personas", luego "Estudiantes" y finalmente en "Crear"</label>
@endif
</body>
<footer>
	<div >
  		<label>{{ $fecha }}</label>
	</div>
</footer>
</html>
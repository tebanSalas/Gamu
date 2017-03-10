<!DOCTYPE html>
<html lang="en">

<head>
<title>Lista de Cursos</title>
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
<h3>Listado de Cursos</h3>

<table >
		 		
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Sigla</th>
			<th>Tipo</th>
	</thead>
	<tbody>

		@foreach($cursos as $curso)
			@if($curso->delete == 0)	
			<tr>
				 <td>{{ $curso->nombre }} </td>
				 <td>{{ $curso->sigla }}</td>
				 <td>{{ $curso->tipo }}</td>
			</tr>
			@endif	
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
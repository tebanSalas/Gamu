<!DOCTYPE html>
<html lang="en">

<head>
<title>Lista de Becas Registradas</title>
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
<h3>Listado de Becas</h3>
@if(!empty($becas))
<table >		
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Descuento</th>
			<th>Detalle</th>	
	</thead>
	<tbody>
		@foreach($becas as $beca)
			@if($beca->delete == 0)	
			<tr>
				 <td>{{ $beca->nombre }}</td>
				 <td>{{ $beca->descuento }}</td>
				 <td>{{ $beca->detalle }}</td> 
			</tr>
			@endif	
		@endforeach
	</tbody>	 		
</table>
@else
<label> No se registraron becas en el sistema. Intente insertando una beca en la pesaña "Becas".</label>
@endif
</body>

<footer>
	<div >
  		<label>{{ $fecha }}</label>
	</div>
</footer>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Historico de Pagos</title>
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
@if(!empty($pago))
@foreach($pago as $p)
	@if($loop->last)	
		<h3>Historico de pagos del estudiante {{ $p->nombre }} {{ $p->apellidos }} Ced.{{ $p->cedula }}</h3>
	@endif		
@endforeach
<table >	 		
	<thead>
		<tr>
			<th>Mes Pagado</th>
			<th>Fecha Pago (aaaa-mm-dd)</th>
			<th>Núm. Recibo</th>
	</thead>
	<tbody>
		@foreach($pago as $p)	
			<tr>
				 <td>{{ $p->mes_cobro }} </td>
				 <td>{{ $p->fecha_pago }}</td>
				 <td>{{ $p->recibo_banco }}</td>
			</tr>
		@endforeach
	</tbody>		
</table>
@else
	<label id="b">No se registraron pagos en el presente año.</label>
@endif
</body>

<footer>
	<div >
  		<label>{{ $fecha }}</label>
	</div>
</footer>

</html>
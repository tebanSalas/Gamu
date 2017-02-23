@extends('layouts.navBarApp') 

 @section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-striped">
		 		
			 		<thead>
			 			<th>Reporte</th>
			 			<th>Detalle</th>
			 			<th>Generar</th>
			 		</thead>
			 		<tbody>
							<tr>
				 				<td>Inventario de instrumentos</td>
				 				<td>Muestra una lista en PDF que puede ser descargada e impresa de todos los instrumentos que se encuentran en el sistema con todas sus características</td>
				 				<td><a href="" class="btn btn-warning">Ver </a> </td>
				 			</tr>
				 			<tr>
				 				<td>Instrumentos Disponibles</td>
				 				<td>Muestra una lista de todos los instrumentos que aún no tienen un estudiante asignado </td>
				 				<td><a href="" class="btn btn-warning">Ver </a>  </td>
				 			</tr>
				 			<tr>
				 				<td>Instrumentos Ocupados</td>
				 				<td>Muestra una lista de todos los instrumentos que ya fueron asignados, además de los datos del estudiante que posee el instrumento. </td>
				 				<td><a href="" class="btn btn-warning">Ver </a>  </td>
				 			</tr>
				 		
			 		</tbody>
		 		
 			</table>
        </div>
    </div>
</div>




 	

  @endsection
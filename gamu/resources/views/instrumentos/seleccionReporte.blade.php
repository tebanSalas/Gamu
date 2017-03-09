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
				 				<td><strong>Inventario de instrumentos</strong></td>
				 				<td>Desplega una lista de la totalidad de los instrumentos que han sido registrados, con todas sus características</td>
				 				<td><a href="" class="btn btn-warning">Ver </a> </td>
				 			</tr>
				 			<tr>
				 				<td><strong>Instrumentos Disponibles</strong></td>
				 				<td>Muestra una lista de todos los instrumentos que aún no tienen un estudiante asignado </td>
				 				<td><a href="" class="btn btn-warning">Ver </a>  </td>
				 			</tr>
				 			<tr>
				 				<td><strong>Instrumentos Ocupados</strong></td>
				 				<td>Muestra una lista de todos los instrumentos que ya fueron asignados, además de los datos del estudiante que posee el instrumento. </td>
				 				<td><a href="" class="btn btn-warning">Ver </a>  </td>
				 			</tr>
				 		
			 		</tbody>
		 		
 			</table>
        </div>
    </div>
</div>




 	

  @endsection
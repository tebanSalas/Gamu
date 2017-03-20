@extends('layouts.navBarApp') 

 @section('content')

@if(session()->has('msj'))
	<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('msj')}}</div>
@endif
@if(session()->has('msj2'))
<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('msj2')}}</div>
@endif


<div class="container">
  <div class="row">
		<div class="form-group">
  			<div class="col-md-offset-2 col-md-7" >
  				<input id="nombre" name="nombre" type="text" class="form-control col-md-12"  placeholder="Ingrese un nombre del estudiante a buscar" >
  			</div>
  			<div class="col-md-2" >
  				<input id="btnBuscar" type="submit" class="btn btn-success " value="Buscar">
   			</div>  
   		</div>  
  </div>
</div>
	
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table  class="table table-striped">
		 		
			 		<thead>
			 			<th>Nombre</th>
			 			<th>Cédula</th>
			 			<th>Teléfono</th>
			 			<th>Contacto de Emergencia</th>
			 			<th>Matricular</th>
			 		</thead>
			 		<tbody id="listaEstudiantes">
			 			
			 		</tbody>
		 		
 			</table>
 			
        </div>
    </div>
</div>

<!-- Modal Estudiante-->
        <div id="recibo" class="modal fade" role="dialog">
          <div class="modal-dialog">
<!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ingrese el número del comprobante de pago:</h4>
              </div>
             <div class="modal-body">
             	<form class="form-horizontal" role="form" method="POST" action="{{ url('/validaRecibo') }}">
             	  {{ csrf_field() }}
             	  <input type="hidden" name="idEstud" id="idEstud">
                  <input type="text" class="form-control" name="comprobante" id="comprobante" placeholder="Número de recibo" maxlength="60">
              </div>
              <div class="modal-footer">
                <input type="submit" name="btnValidarRecibo" id="btnValidarRecibo" value="Continuar" class="btn btn-success"  >

                </form>

                <button type="button" class="btn btn-warning" data-dismiss="modal">Vover</button>
              </div>
            </div>
          </div>
        </div>
 @endsection

 @section('scripts')
   <script src="js/estudiantesMatricula.js"></script>
@endsection
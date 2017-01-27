 @extends('layouts.navBarApp') 

 @section('content')

<!-- mensajes de sucess y error-->
@if(session()->has('msj'))
	<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('msj')}}</div>
@endif
@if(session()->has('msj2'))
<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('msj2')}}</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">Ingrese la información de la beca que se le solicita</div>
                <div class="panel-body">

<!-- Nombre -->
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/becas') }}">
                    	{{ csrf_field() }}
  						<div class="form-group">
    						<label class="control-label col-sm-2" for="nombre">Nombre:</label>
    						<div class="col-sm-10">
      							<input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre" required>
      			<!-- validación de nombre -->				
      							@if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
    						</div>
  						</div>

<!-- Descuento -->
  						<div class="form-group">
  						  <label class="control-label col-sm-2" for="descuento">Descuento:</label>
  						  	<div class="col-sm-10"> 
  						    	<input type="number" min="0" max="100" class="form-control" name="descuento" placeholder="Porcentaje de descuento" required>
  				<!-- validación de nombre -->		    	
  						    	@if ($errors->has('descuento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descuento') }}</strong>
                                    </span>
                                @endif
  						 	</div>
  						</div>
<!-- detalles -->
  						<div class="form-group">
  						  <label class="control-label col-sm-2" for="detalle">Detalles:</label>
  						  	<div class="col-sm-10"> 
  						    	<textarea type="text" class="form-control" name="detalle" placeholder="Indique los requisitos para esta beca" required></textarea>
  				<!-- validación de descuento -->
  						    	@if ($errors->has('detalle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('detalle') }}</strong>
                                    </span>
                                @endif
  						 	</div>
  						</div>
<!-- boton -->
  						<div class="form-group"> 
    						<div class="col-sm-offset-2 col-sm-10">
      						<button type="submit" class="btn btn-theme">Guardar</button>
    						</div>
  						</div>

						</form>
                </div>
            </div>
        </div>
    </div>
</div>
 

 @endsection
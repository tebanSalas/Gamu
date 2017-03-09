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
                <div class="panel-heading">Seleccione el estudiante para registrar el pago</div>
                <div class="panel-body">                
<!-- Estudiante -->
                    <div class="form-group">
                      <div class="col-xs-2" >
                        <label  class="control-label col-xs-2" >Estudiante</label>
                      </div>
                      <div class="col-xs-8" >
                        <select id="estudiantes" class="btn btn-default col-xs-12" name="estudiantes" >
                        @foreach ($estud as $est)
                          <option value="{{ $est->id }}" >{{ $est->nombre }} {{ $est->apellidos }}</option>
                        @endforeach
                        </select>
                      </div>
                      <div class="col-xs-2" >
                        <button type="button" class="btn btn-warning col-xs-10" data-toggle="modal" data-target="#estud">Buscar</button>
                      </div>
                      </div>

<!-- Boton -->
                      <div class="form-group"> 
                        <div class="col-xs-offset-5 col-xs-2">
                           <button type="submit" id="btnPago" class="btn btn-theme">Registar Factura</button>
                        </div>
                      </div>
                </div>
              </div>
            

<!-- Datos de Facturas -->                
                <div class="panel panel-default" id="panelFacturas" style="display:none">
                  <div class="panel-heading"><label>Ingrese los datos que se solicitan para completar el pago.</label></div>
                  <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/facturas') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="recibo">Recibo.</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="recibo" name="recibo" placeholder="Ingrese el número del comprobante de pago" required>
                        <!-- validación de nombre -->       
                          @if ($errors->has('nombre'))
                            <span class="help-block">
                              <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                          @endif
                      </div>
                    </div>  
                    <input type="hidden" id="idEstud" name="idEstud">
                    <div class="form-group">
                      <label class="control-label col-sm-2" >Selecciones el mes al cobro:</label>
                      <div class="col-sm-10">
                        <select id="mesPago" class="btn btn-default col-sm-12" name="mesPago" >
                          <option value="Enero" >Enero</option>
                          <option value="Febrero" >Febrero</option>
                          <option value="Marzo" >Marzo</option>
                          <option value="Abril" >Abril</option>
                          <option value="Mayo" >Mayo</option>
                          <option value="Junio" >Junio</option>
                          <option value="Julio" >Julio</option>
                          <option value="Agosto" >Agosto</option>
                          <option value="Septiembre" >Septiembre</option>
                          <option value="Octubre" >Octubre</option>
                          <option value="Noviembre" >Noviembre</option>
                          <option value="Diciembre" >Diciembre</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="recibo">Meses Pagados</label>
                      <div class="col-sm-10">
                        <textarea type="text" id="mesesListos" name="MesesListo" class="form-control" readonly></textarea> 
                       </div>
                    </div>
                    <div class="form-group"> 
                    <div class="col-sm-offset-10 col-sm-2">
                      <button type="submit" class="btn btn-theme">Guardar</button>
                    </div>
                  </div>
                  </form>
                 </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal Estudiante-->
        <div id="estud" class="modal fade" role="dialog">
          <div class="modal-dialog">
<!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ingrese el nombre del estudiante que desea:</h4>
              </div>
             <div class="modal-body">
                  <input type="hidden" name="_method" value="{{ csrf_token() }}"> 
                  <input type="text" class="form-control" name="nombreE" id="nombreE" placeholder="Ingrese el nombre">
              </div>
              <div class="modal-footer">
                <a href="#" id="btnBuscarEstud" class="btn btn-success" data-dismiss="modal">Buscar</a>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Vover</button>
              </div>
            </div>
          </div>
        </div>

  

 @endsection

 @section('scripts')
  <script src="js/cargarFacturas.js"></script>
   <script src="js/buscarEstudiantes.js"></script>
@endsection
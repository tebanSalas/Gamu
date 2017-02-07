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
                <div class="panel-heading">Seleccione el estudiante, seguidamente la beca que le asiganará al mismo</div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/cursos') }}">
                    {{ csrf_field() }}

<!-- Estudiante -->
                    <div class="form-group">
                      <div class="col-md-2" >
                        <label class="control-label col-sm-2" for="nombre">Estudiante</label>
                      </div>

                      <div class="col-md-8" >
                        <select class="btn btn-default col-md-12" name="id_beca" >
                         <option value="1">Esteban Salas</option>
                          <option value="2">Benito Camela</option>
                        </select> 
                      </div>
                      
                      <div class="col-md-2" >
                        <button type="button" class="btn btn-warning col-md-10" data-toggle="modal" data-target="#estud">Buscar</button>
                      </div>
<!-- Modal -->
                        <div id="estud" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                        
              <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Ingrese el nombre del estudiante que desea:</h4>
                            </div>
                            <div class="modal-body">
                              <input type="text" class="form-control" name="busqueda" id="busqueda" placeholder="Ingrese el nombre">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-dismiss="modal">Buscar</button>
                            </div>
                          </div>

                          </div>
                        </div>
                      </div>

<!-- Beca -->
                    <div class="form-group">
                      <div class="col-md-2" >
                        <label class="control-label col-sm-2" for="nombre">Beca</label>
                      </div>

                      <div class="col-md-8" >
                        <select class="btn btn-default col-md-12" name="id_beca" >
                         <option value="1">Esteban Salas</option>
                          <option value="2">Benito Camela</option>
                        </select> 
                      </div>
                      
                      <div class="col-md-2" >
                        <button type="button" class="btn btn-warning col-md-10" data-toggle="modal" data-target="#becas">Buscar</button>
                      </div>
                        <!-- Modal -->
                        <div id="becas" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                        
                           <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Ingrese el nombre de la beca</h4>
                            </div>
                            <div class="modal-body">
                              <input type="text" class="form-control" name="busqueda" id="busqueda" placeholder="Ingrese el nombre">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-dismiss="modal">Buscar</button>
                            </div>
                          </div>

                          </div>
                        </div>
                      </div>


                      <div class="form-group"> 
                        <div class="col-md-offset-10 col-md-2">
                          <button type="submit" class="btn btn-theme col-md-10">Asignar</button>
                        </div>
                      </div>

						      </form>
                </div>
            </div>
        </div>
    </div>
</div>


 @endsection
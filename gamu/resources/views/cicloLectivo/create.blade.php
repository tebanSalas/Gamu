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
                <div class="panel-heading">Habilitar ciclo lectivo</div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/ciclos') }}">
                    {{ csrf_field() }}

<!-- ciclo -->
                  <div class="form-group">
                    <label class="control-label col-xs-2" for="ciclo">Ciclo Lectivo:</label>
                      <div class="dropdown col-xs-10">
                        <select class="btn btn-default " name="ciclo" placeholder="Seleccione un año">
                          <option value="I Ciclo">I ciclo</option>
                          <option value="II Ciclo">II ciclo</option>

                        </select>
                    </div>
                  </div>

<!-- año -->
                  <div class="form-group">
                    <label class="control-label col-xs-2" for="year">Año:</label>
                      <div class="dropdown col-xs-10">
                      <select class="btn btn-default " name="year" placeholder="Seleccione un año">
                        @for ($i = 2012; $i < 2050; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                        @endfor

                        
                      </select>
                    </div>
                  </div>


<!-- boton -->
                  <div class="form-group"> 
                    <div class="col-xs-offset-2 col-xs-10">
                      <button type="submit" class="btn btn-theme">Habilitar</button>
                    </div>
                  </div>

                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
 

 @endsection



@extends('layouts.navBarApp') 

 @section('content')



<div id="service">
    <div class="container">
      <div class="row centered">
        <div class="col-md-4">
          <i class="fa fa-plus-square-o"></i>
          <h4>Crear</h4>
          <p>Acá podes registrar un nuevo profesor, el registrarlo estará disponible para asignarlo a cualquiera de los cursos disponibles.</p>
          <p><br/><a href="../../../profesores/create" class="btn btn-theme">Entar </a></p>
        </div>
        <div class="col-md-4">
          <i class="fa fa-cogs"></i>
          <h4>Mantenimiento</h4>
          <p>Encontarás a los profesores que se encuentran en el sistema, y toda esa información está disponible para 
          ser actualizada en cualquier momento. </p>
          <p><br/><a href="../../../profesores/" class="btn btn-theme">Entar</a></p>
        </div>
        <div class="col-md-4">
          <i class="fa fa-list"></i>
          <h4>Profesores</h4>
          <p>Se desplega un listado con toda la información que necesitas saber sobre todos los profesores. Lista para ser impresa</p>
          <p><br/><a href="/ListaProfesoresPDF" class="btn btn-theme">Entar</a></p>
        </div>            
      </div>
    </div>
   </div>
 

 @endsection
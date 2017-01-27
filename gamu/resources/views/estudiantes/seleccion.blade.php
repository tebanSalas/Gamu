@extends('layouts.navBarApp') 

 @section('content')



<div id="service">
    <div class="container">
      <div class="row centered">
        <div class="col-md-3">
          <i class="fa fa-plus-square-o"></i>
          <h4>Crear</h4>
          <p>Acá podes registrar un nuevo estudiante, al registrarlo estará disponible para matricularlo en cualquiera de los cursos, además de asignarle una beca</p>
          <p><br/><a href="../../../estudiantes/create" class="btn btn-theme">Entar </a></p>
        </div>
        <div class="col-md-3">
          <i class="fa fa-cogs"></i>
          <h4>Mantenimiento</h4>
          <p>Encontarás a los estudiantes que se encuentran en el sistema, y toda esa información está disponible para 
          ser actualizada en cualquier momento. </p>
          <p><br/><a href="../../../estudiantes/" class="btn btn-theme">Entar</a></p>
        </div>
        <div class="col-md-3">
          <i class="fa fa-list"></i>
          <h4>Estudiantes</h4>
          <p>Se desplega un listado de todos lo estudiantes con toda la información respectiva de cada estudiante. Listo para ser impreso.</p>
          <p><br/><a href="/ListaEstudiantesPDF" class="btn btn-theme">Entar</a></p>
        </div>  
        <div class="col-md-3">
          <i class="fa fa-list"></i>
          <h4>Informe de matrícula</h4>
          <p>Acá se podrá obtener un informe de matricula de cada estudiante en particular que se podrá imprimir en cualquier momento y ser entregado al estudiante. </p>
          <p><br/><a href="#" class="btn btn-theme">Entar</a></p>
        </div>           
      </div>
    </div>
   </div>
 

 @endsection
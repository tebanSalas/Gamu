@extends('layouts.navBarApp') 

 @section('content')



<div id="service">
    <div class="container">
      <div class="row centered">
        <div class="col-md-offset-1 col-md-3">
          <i class="fa fa-plus-square-o"></i>
          <h4>Crear</h4>
          <p>Acá podes registrar un nuevo estudiante, al registrarlo estará disponible para matricularlo en cualquiera de los cursos, además de asignarle una beca</p>
          <p><br/><a href="../../../estudiantes/create" class="btn btn-theme">Entar </a></p>
        </div>
        <div class="col-md-offset-1 col-md-3">
          <i class="fa fa-cogs"></i>
          <h4>Mantenimiento</h4>
          <p>Encontarás a los estudiantes que se encuentran en el sistema, y toda esa información está disponible para 
          ser actualizada en cualquier momento. </p>
          <p><br/><a href="../../../estudiantes/" class="btn btn-theme">Entar</a></p>
        </div>
        <div class="col-md-offset-1 col-md-3">
          <i class="fa fa-list"></i>
          <h4>Estudiantes</h4>
          <p>Se desplega un listado de todos lo estudiantes con toda la información respectiva de cada estudiante. Listo para ser impreso.</p>
          <p><br/><a href="/ListaEstudiantesPDF" class="btn btn-theme">Entar</a></p>
        </div>  
        <div class="col-md-offset-3 col-md-3">
          <i class="fa fa-check"></i>
          <h4>Activación de Estudiantes</h4>
          <p>Lista los estudiantes que han sido inactivados, y brinda la posibilidad de poder activarlos para que puedan incorporarse como estudiantes regulares. </p>
          <p><br/><a href="/indexInactivos" class="btn btn-theme">Entar</a></p>
        </div>
        <div class="col-md-offset-1 col-md-3">
          <i class="fa fa-check"></i>
          <h4>Informe de Matrícula</h4>
          <p>Al seleccionar cualquiera de los estudiantes, se genera un reporte en donde se muestran los cursos matriculados el profesor que imparte, y el horario </p>
          <p><br/><a href="/buscaEstudianteInformeMatricula" class="btn btn-theme">Entar</a></p>
        </div>            
      </div>
    </div>
   </div>
 

 @endsection
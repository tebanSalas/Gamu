@extends('layouts.app') 

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand" href="../../../../home"><i class="fa fa-home" aria-hidden="true"></i>  Inicio</a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">

                <!-- PERSONAS -->                
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Personas <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="../../estudSeleccion">Estudiantes</a></li>
                        <li><a href="../../personSeleccion">Profesores</a></li>
                    </ul>
                </li>

                <!-- Instrumentos-->
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Instrumentos<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="../../../instrumentos/create"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Nuevo</a></li>
                        <li><a href="../../../instrumentos"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a></li>
                        <li><a href="../../../AsiganarInstrumentos"><i class="fa fa-link" aria-hidden="true"></i> Prestamo</a></li>
                        <li><a href=""><i class="fa fa-chain-broken" aria-hidden="true"></i> Devolución de Instrumentos</a></li>
                        <li><a href="../../../seleccionReporte"><i class="fa fa-line-chart" aria-hidden="true"></i> Reportes</a></li>
                    </ul>
                </li>

                <!-- Cursos-->
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Cursos<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="../../../cursos/create"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Nuevo</a></li>
                        <li><a href="../../../cursos"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a></li>
                        <li><a href="../../../habilitarCursos"><i class="fa fa-link" aria-hidden="true"></i> Habilitar Cursos</a></li>
                        <li><a href="/ListaCursosPDF"><i class="fa fa-check" aria-hidden="true"></i> Cursos Registrados</a></li>
                        <li><a href=""><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Guía de Cursos y Horarios </a></li>
                    </ul>
                </li>

                <!-- Matricula-->
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Matrícula <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="../../../matriculas"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Nueva</a></li>
                        <li><a href="../../../talleres"><i class="fa fa-list-ul" aria-hidden="true"></i> Talleres</a></li>
                        <li><a href=""><i class="fa fa-line-chart" aria-hidden="true"></i> Reporte</a></li>
                        <li><a href="../../../ciclos/create"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Habilitar Ciclo Lectivo</a></li>
                    </ul>
                </li>

                <!-- Academico-->
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Académico<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="../../../buscaRegistar"><i class="fa fa-list-alt" aria-hidden="true"></i> Registrar Notas</a></li>
                        <li><a href=""><i class="fa fa-book" aria-hidden="true"></i> Expediente Académico</a></li>
                    </ul>
                </li>

                <!-- Pago-->
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Pago <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="../../../facturas"><i class="fa fa-usd" aria-hidden="true"></i> Registrar Pagos</a></li>
                        <li><a href=""><i class="fa fa-money" aria-hidden="true"></i> Pagos Estudiante</a></li>
                        <li><a href=""><i class="fa fa-bar-chart" aria-hidden="true"></i> Morosos</a></li>
                    </ul>
                </li>                    
                    
                <!-- becas-->
                <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">Becas <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="../../../becas/create"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Nueva Categoria</a></li>
                        <li><a href="../../../becas"><i class="fa fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a></li>
                        <li><a href="../../../AsiganarBecas"><i class="fa fa-link" aria-hidden="true"></i> Asignar Becas</a></li>
                        <li><a href=""><i class="fa fa-line-chart" aria-hidden="true"></i> Lista de Becados </a></li>
                        <li><a href="/ListaBecasPDF"><i class="fa fa-list" aria-hidden="true"></i> Lista de Becas Registradas </a></li>
                    </ul>
                </li>


                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        Logout 
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                    <li><a href="../../register"><i class="fa fa-user-plus" aria-hidden="true"></i> Nuevo Usuario</a></li>
                                    <li><a href="../../../usuarios"><i class="fa fa-info" aria-hidden="true"></i> Administración de usuarios</a></li>
                                    <li><a href="../../acercade"><i class="fa fa-info" aria-hidden="true"></i> Acerca de</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
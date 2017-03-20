@extends('layouts.app') 
<nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" >
                    GAMU - Sistema de Escuelas de Música de Paraíso
                </a>
            </div>
        </div>    
</nav>

@section('content')
    <style>
    .a {
        height: 100%
        margin: 0;
        padding: 0;
        width: 100%;
        color: #384452;
        display: table;
        font-weight: 100;
        font-family: 'Lato', sans-serif;
        text-align: center;
        display: table-cell;
        vertical-align: middle;
        text-align: center;
        display: inline-block;
        font-size: 72px;
        margin-bottom: 40px;
    }
    footer{
            text-align: center;
            width: 100%;
            bottom: 25;
            position:fixed;
            height: 45px
    }

 
</style>

    <label  id="a" class="a"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Opa! Algo está saliendo mal.</label>  
   <img src="/img/404.jpg" alt="Logo Escuela Comunal de Musica de Orosi" class="img-responsive">
    
    <footer>
        <a href="javascript:history.back(-1);"  class="btn btn-theme" title="Ir la página anterior">Volver</a>
    </footer>   
            
       

        
  
@endsection


<!DOCTYPE html>
<html lang="en">

<head>
<title>Información de {{ $estu->nombre }} {{ $estu->apellidos }}</title>
	<style>
		h2 {
			border-bottom-style: solid;
    		color: #384452;
    		text-align: center;
			}
		div{
			margin: 10px 0px 10px 50px;
		}
		label{
			font: arial;
			font-size: 16px;

		}
		#b{
			font-weight: bold;
		}
		#a{
			text-align: center;
			font-size: 18px;
			color: #384452;
			font-weight: bold;
		}
		#c{
			margin-left: 50px;
			color: #384452;
		}
		h3{
			color: #384452;
    		text-align: center;
		}
		footer{
			text-align: right;
			width: 100%;
    		bottom: 0;
    		position:fixed;
    		height: 45px
		}
	</style>

<h2>Sistema de Escuelas de Música de Paraíso</h2>

</head> 

<body>
<h3>Información del Estudiante: {{ $estu->nombre }}</h3>
<!-- Nombre -->
	<div >
  		<label id="b" >Nombre completo: </label>
  		<label >{{ $estu->nombre }} {{ $estu->apellidos }}</label>
	</div>  
<!-- cedula -->
	<div >
  		<label id="b">Número de cédula:</label>
  		<label >{{ $estu->cedula }}</label>
	</div> 
<!-- Fecha de nacimiento -->
	<div >
  		<label id="b">Fecha de Nacimiento:</label>
  		<label >{{ $estu->fecha_nacimiento }} (aaaa/mm/ff)</label>
	</div>
<!-- telefono -->
	<div >
  		<label id="b">Telefono:</label>
  		<label >{{ $estu->telefono }}</label>
	</div>
<!-- email -->
	<div >
  		<label id="b">Correo Electrónico:</label>
  		<label >{{ $estu->email }}</label>
	</div>
<!-- sede  -->
	<div >
  		<label id="b">Sede:</label>
  		<label >{{ $estu->sede }}</label>
	</div>
<!-- beca -->
	<div >
  		<label id="b">Beca:</label>
  		<label >{{ $estu->id_beca }}</label>
	</div>

 <!-- emergencia -->
	<div >
  		<label id="a">Información de padres de familia </label>
	</div>

	
<label id="c">Contacto #1:</label>
<!-- Nombre -->
	<div >
  		<label id="b">Nombre:</label>
  		<label >{{ $estu->nombre_padre1 }}</label>
	</div>

<!-- telefono -->
	<div >
  		<label id="b">Teléfono:</label>
  		<label >{{ $estu->tel_padre1 }} </label>
	</div>

<!-- Correo -->
	<div >
  		<label id="b">Correo electrónico:</label>
  		<label >{{ $estu->email }}</label>
	</div>

<!-- contacto2-->
<label id="c">Contacto #2:</label>
<!-- Nombre -->
	<div >
  		<label id="b">Nombre:</label>
  		<label >{{ $estu->nombre_padre2 }}</label>
	</div>
<!-- telefono -->
	<div >
  		<label id="b">Telefóno:</label>
  		<label >{{ $estu->tel_padre2 }} </label>
	</div>

</body>

<footer>
	<div >
  		<label>{{ $fecha }}</label>
	</div>
</footer>

</html>
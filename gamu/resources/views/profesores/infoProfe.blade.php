<!DOCTYPE html>
<html lang="en">
<head>
<title>Profesor {{ $profe->nombre }} {{ $profe->apellidos }}</title>
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

<h2>Escuela Comunal de Música de Orosi</h2>

</head> 

<body>
<h3>Información del Profesor: {{ $profe->nombre }}</h3>
<!-- Nombre -->
	<div >
  		<label id="b" >Nombre completo: </label>
  		<label >{{ $profe->nombre }} {{ $profe->apellidos }}</label>
	</div>  
<!-- cedula -->
	<div >
  		<label id="b">Número de cédula:</label>
  		<label >{{ $profe->cedula }}</label>
	</div> 
<!-- Fecha de nacimiento -->
	<div >
  		<label id="b">Fecha de Nacimiento:</label>
  		<label >{{ $profe->fecha_nacimiento }} (aaaa/mm/ff)</label>
	</div>
<!-- telefono -->
	<div >
  		<label id="b">Telefono:</label>
  		<label >{{ $profe->telefono }}</label>
	</div>
<!-- email -->
	<div >
  		<label id="b">Correo Electrónico:</label>
  		<label >{{ $profe->email }}</label>
	</div>
<!-- sede  -->
	<div >
  		<label id="b">Especialidad:</label>
  		<label >{{ $profe->especialidad }}</label>
	</div>
<!-- beca -->
	<div >
  		<label id="b">Sueldo:</label>
  		<label >{{ $profe->sueldo }}</label>
	</div>

 

</body>

<footer>
	<div >
  		<label>{{ $fecha }}</label>
	</div>
</footer>

</html>
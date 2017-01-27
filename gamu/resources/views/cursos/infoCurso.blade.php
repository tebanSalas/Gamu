<!DOCTYPE html>
<html lang="en">

						
<head>
<title>Curso: {{ $curso->nombre }} </title>
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
<h3>Información del Curso: {{ $curso->nombre }}</h3>
<!-- Nombre -->
	<div >
  		<label id="b" >Nombre: </label>
  		<label >{{ $curso->nombre }} </label>
	</div>  
<!-- cedula -->
	<div >
  		<label id="b">Sigla:</label>
  		<label >{{ $curso->sigla }}</label>
	</div> 
<!-- Fecha de nacimiento -->
	<div >
  		<label id="b">Cupo:</label>
  		<label >{{ $curso->cupo }} Espacios.</label>
	</div>
<!-- telefono -->
	<div >
  		<label id="b">Tipo:</label>
  		<label >{{ $curso->tipo }}</label>
	</div>



</body>

<footer>
	<div >
  		<label>{{ $fecha }}</label>
	</div>
</footer>

</html>
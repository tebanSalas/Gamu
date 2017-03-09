$(document).ready(function(){
	var table = $("#listaEstudiantes");
	var route = "http://localhost:8000/inactivos";

	$.get(route, function(res){
		$(res).each(function(key,value){
			table.append("<tr><td>"+value.nombre+" "+value.apellidos+"</td><td>"+value.cedula+"</td><td>"+value.telefono+"</td><td>"+value.nombre_padre1+" "+value.tel_padre1+"</td><td><button type='button' value="+value.id+" onclick='Mostrar(this);' class='btn btn-theme' data-toggle='modal' data-target='#myModal'>Activar</button></td></tr>");
		});
	});
});


$("#btnBuscar").click(function(){
	var table = $("#listaEstudiantes");
	table.html('');	
	var nombre = $("#nombre").val();
	var route = "http://localhost:8000/buscarInactivo/"+nombre+"";

	$.get(route, function(res){
		$(res).each(function(key,value){
			table.append("<tr><td>"+value.nombre+" "+value.apellidos+"</td><td>"+value.cedula+"</td><td>"+value.telefono+"</td><td>"+value.nombre_padre1+" "+value.tel_padre1+"</td><td><button type='button' value="+value.id+" onclick='Mostrar(this);' class='btn btn-theme' data-toggle='modal' data-target='#myModal'>Activar</button></td></tr>");
		});
	});
});

function Mostrar(btn){
	$("#id").val(btn.value);
} 
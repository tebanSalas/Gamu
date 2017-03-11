$(document).ready(function(){
	var table = $("#listaEstudiantes");
	var route = "http://localhost:8000/matriculas/create";

	$.get(route, function(res){
		$(res).each(function(key,value){
			table.append("<tr><td>"+value.nombre+" "+value.apellidos+
				"</td><td>"+value.cedula+"</td><td>"+value.telefono+
				"</td><td>"+value.nombre_padre1+" "+value.tel_padre1+
				"</td><td><a href='/informeMatricula/"+value.id+"' class='btn btn-warning'>Generar Informe</a></td></tr>");
		});
	});
});


$("#btnBuscar").click(function(){
	var table = $("#listaEstudiantes");
	table.html('');	
	var nombre = $("#nombre").val();
	var route = "http://localhost:8000/estuMatricu/"+nombre+"";

	$.get(route, function(res){
		$(res).each(function(key,value){
			table.append("<tr><td>"+value.nombre+" "+value.apellidos+
				"</td><td>"+value.cedula+"</td><td>"+value.telefono+
				"</td><td>"+value.nombre_padre1+" "+value.tel_padre1+
				"</td><td><a href='/informeMatricula/"+value.id+"' class='btn btn-warning'>Generar Informe</a></td></tr>");
		});
	});
});

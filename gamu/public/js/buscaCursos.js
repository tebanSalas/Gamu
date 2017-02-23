$("#btnBuscarCurso").click(function(){
	var drop = $("#cursos");
	drop.html('');	
	var nombre = $("#nombreCurso").val();
	var route = "http://localhost:8000/buscaCurso/"+nombre+"";

	$.get(route, function(res){
		$(res).each(function(key,value){
			drop.append("<option value="+value.id+">"+value.nombre+" - "+value.sigla+"</option>");
		});
	});
});
$("#btnBuscarProfe").click(function(){
	var drop = $("#profesores");
	drop.html('');	
	var nombre = $("#nombreProfe").val();
	var route = "http://localhost:8000/buscaProfe/"+nombre+"";

	$.get(route, function(res){
		$(res).each(function(key,value){
			drop.append("<option value="+value.id+">"+value.nombre+" "+value.apellidos+"</option>");
		});
	});
});
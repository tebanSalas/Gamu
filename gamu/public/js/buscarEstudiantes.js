$("#btnBuscarEstud").click(function(){
	var drop = $("#estudiantes");
	drop.html('');	
	var nombre = $("#nombreE").val();
	var route = "http://localhost:8000/buscaEstu/"+nombre+"";

	$.get(route, function(res){
		$(res).each(function(key,value){
			window.alert(value.apellido);
			drop.append("<option value="+value.id+">"+value.nombre+" "+value.apellido+"</option>");
		});
	});
});
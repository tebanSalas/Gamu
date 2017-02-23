$("#btnBuscarInstru").click(function(){
	var drop = $("#instrumentos");
	drop.html('');	
	var nombre = $("#nombreI").val();
	var route = "http://localhost:8000/buscaInstrumento/"+nombre+"";

	$.get(route, function(res){
		$(res).each(function(key,value){
			drop.append("<option value="+value.id+">"+value.nombre+".  //  Serie: "+value.serie+"</option>");
		});
	});
});
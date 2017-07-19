$('#revisar').click(function(){
	var idEstud = $("#estudiantes").val();
	var route = "http://localhost:8000/getPrestamo/"+idEstud+"";
	var drop = $("#instrumentos");
	drop.html('');
	var n =0;
	drop.append("<option value="+n+" selected>"+"No tiene instrumentos relacionados"+"</option>");	
	$("#serie").val("");
	$("#marca").val("");

	$.get(route, function(res){
		$(res).each(function(key,value){
			drop.append("<option value="+value.id+" selected>"+value.nombre+"</option>");
			$("#serie").val(value.serie);
			$("#marca").val(value.marca);
			$("#idPrestamo").val(value.idPrestamo);
		});
		$("#idEstud").val(idEstud);
		$("#panelFacturas").fadeIn();
	});
});

$('#estudiantes').change(function(){
	
	$("#panelFacturas").fadeOut();
	/*
	var idEstud = $("#estudiantes").val();
	var route = "http://localhost:8000/getPrestamo/"+idEstud+"";
	var drop = $("#instrumentos");
	drop.html('');
	$.get(route, function(res){
		$(res).each(function(key,value){
			
				drop.append("<option value="+value.id+" selected>"+value.nombre+"</option>");
				$("#serie").val(value.serie);
				$("#marca").val(value.marca);
				$("#idPrestamo").val(value.idPrestamo);
			
			
		});
		$("#idEstud").val(idEstud);
		
	});*/
});

$('#instrumentos').change(function(){
	var idInstru = $('#instrumentos').val();
	var route = "http://localhost:8000/getInstrumento/"+idInstru+"";
	$.get(route, function(res){
		$(res).each(function(key,value){

			
			$("#serie").val("");
			$("#marca").val("");
			$("#serie").val(value.serie);
			$("#marca").val(value.marca);
			$("#idPrestamo").val(value.idPrestamo);
		});
		
	});
});
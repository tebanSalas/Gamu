$('#revisar').click(function(){
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
		$("#panelFacturas").fadeIn();
	});
});

$('#estudiantes').change(function(){
	
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
	});
});

$('#instrumentos').change(function(){
	var idInstru = $('#instrumentos').val();
	var route = "http://localhost:8000/getInstrumento/"+idInstru+"";
	$.get(route, function(res){
		$(res).each(function(key,value){
			$("#serie").val(value.serie);
			$("#marca").val(value.marca);
			$("#idPrestamo").val(value.idPrestamo);
		});
		
	});
});
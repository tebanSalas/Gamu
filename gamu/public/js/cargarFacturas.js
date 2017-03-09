$('#btnPago').click(function(){
	
	var idEstud = $("#estudiantes").val();
	var route = "http://localhost:8000/facturas/"+idEstud+"";
	var meses="";
	$.get(route, function(res){
		$(res).each(function(key,value){
			meses= meses+" "+value.mes_cobro+",";
		});
		$("#mesesListos").val(meses);
		$("#idEstud").val(idEstud);
		$("#panelFacturas").fadeIn();
	});
});

$('#estudiantes').change(function(){
	
	var idEstud = $("#estudiantes").val();
	var route = "http://localhost:8000/facturas/"+idEstud+"";
	var meses="";
	$.get(route, function(res){
		$(res).each(function(key,value){
			meses= meses+" "+value.mes_cobro+",";
		});
		$("#mesesListos").val(meses);
		$("#idEstud").val(idEstud);
	});
});
$('#btnPago').click(function(){
	
	var idEstud = $("#estudiantes").val();
	var route = "http://localhost:8000/facturas/"+idEstud+"";
	var meses="Meses pagados, con el número de recibo que se registró.\n";
	$.get(route, function(res){
		$(res).each(function(key,value){
			meses= meses+"Mes: "+value.mes_cobro+". "+value.recibo_banco+"\n";
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
			meses= meses+"Mes: "+value.mes_cobro+". "+value.recibo_banco+"\n";
		});
		$("#mesesListos").val(meses);
		$("#idEstud").val(idEstud);
	});
});
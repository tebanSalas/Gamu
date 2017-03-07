$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});

//llena el cuadro de horario de instrumentos
$("#M_instrumento").change(function(){
	var id_curProf = $("#M_instrumento").val();
	var route = "http://localhost:8000/getHorario/"+id_curProf+"";
	$.get(route, function(res){
		$(res).each(function(key,value){
			horario = $("#horarioI").val(value.horario);
		});
	});
});
//llena el cuadro de horario de teoricos
$("#M_teorico").change(function(){
	var id_curProf = $("#M_teorico").val();
	var route = "http://localhost:8000/getHorario/"+id_curProf+"";
	$.get(route, function(res){
		$(res).each(function(key,value){
			horario = $("#horarioTE").val(value.horario);
		});
	});
});
//llena el cuadro de horario de talleres
$("#M_taller").change(function(){
	var id_curProf = $("#M_taller").val();
	var route = "http://localhost:8000/getHorario/"+id_curProf+"";
	$.get(route, function(res){
		$(res).each(function(key,value){
			horario = $("#horarioTA").val(value.horario);
		});
	});
});

//guarda la matricula de teoricos
$("#btnteorico").click(function(){
	var id_curProf = $("#M_teorico").val();
	var id_estudiante= $("#idEstudiante").val();
	var recibo= $("#recibo").val();
	var id_ciclo= $("#idCiclo").val();
	var route = "http://localhost:8000/matriculas";
	var token = $("#token").val();
	alert("Esta operación es irreversible")
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{curProf: id_curProf,
			estudiante: id_estudiante,
			factura: recibo,
			ciclo: id_ciclo},

		success:function(){
			$("#success").fadeIn();
			$("#success").delay(2500).fadeOut();
		},
		error:function(){
			$("#error").fadeIn();
			$("#error").delay(4000).fadeOut();
		}
	});
});

//guarda la matricula de instrumentos
$("#btnInstru").click(function(){
	var id_curProf = $("#M_instrumento").val();
	var id_estudiante= $("#idEstudiante").val();
	var recibo= $("#recibo").val();
	var id_ciclo= $("#idCiclo").val();
	var route = "http://localhost:8000/matriculas";
	var token = $("#token").val();
	alert("Esta operación es irreversible")
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{curProf: id_curProf,
			estudiante: id_estudiante,
			factura: recibo,
			ciclo: id_ciclo},

		success:function(){
			$("#success").fadeIn();
			$("#success").delay(2500).fadeOut();
		},
		error:function(){
			$("#error").fadeIn();
			$("#error").delay(4000).fadeOut();
		}
	});
});

//guarda la matricula de talleres
$("#btntaller").click(function(){
	var id_curProf = $("#M_taller").val();
	var id_estudiante= $("#idEstudiante").val();
	var recibo= $("#recibo").val();
	var id_ciclo= $("#idCiclo").val();
	var route = "http://localhost:8000/matriculas";
	var token = $("#token").val();
	alert("Esta operación es irreversible")
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{curProf: id_curProf,
			estudiante: id_estudiante,
			factura: recibo,
			ciclo: id_ciclo},

		success:function(){
			$("#success").fadeIn();
			$("#success").delay(2500).fadeOut();
		},
		error:function(){
			$("#error").fadeIn();
			$("#error").delay(4000).fadeOut();
		}
	});
});
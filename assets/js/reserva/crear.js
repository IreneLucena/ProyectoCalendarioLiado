$(function(){
	var date=new Date();

$(".submit").click(function(){
	//TODO: comprobaciÃ³n de los datos
	var hours=$("#bookingModal .hours:checked");
	var hoursParsed=[];
	for(var i=0; i<hours.length; i++){
		hoursParsed.push($(hours[i]).val());
	}
	console.log(hoursParsed);
	$.ajax("http://localhost/ProyectoCalendario/booking/createPost", {
		type: "POST",
		dataType: "JSON",
		data: {
			date: $("#bookingModal .date").text(),
			hours: hoursParsed
		},
		complete: function(response){
			var result=JSON.parse(response.responseText);
			console.log(result);
			if(result.isValid){
				$("#bookingModal").addClass("hidden");
			}
		}
	});
//BUSCAMOS RESERVAS
	$.ajax("http://localhost/ProyectoCalendario/booking/listarReservaPost", {
		type: "POST",
		dataType: "text",
		data: {
			date: date,
			hours: hours
		},
		complete: function(data){
			var dateC=data[0];
			console.log(dateC);
			var hourC=data[1];0
			var dateCalendar=document.getElementById("datePicked");
			if(dateC.value=dateCalendar.value){
				$(".hours").attr("disabled", true);
			}
		}
	});
});

	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		firstDay: 1,
		editable: true,
		dayRender: function(date, cell) {
			$(cell).append("<div class='spheres'></div><div class='spheres'></div><div class='spheres'></div><div class='spheres'></div><div class='spheres'></div><div class='spheres'></div><div class='spheres'></div>");
		},
		dayClick: function(date, jsEvent, view)
		{
			var modal=$("#bookingModal");
			modal.find(".date").text(date.format('YYYY-MM-DD'));
			modal.removeClass("hidden");
			console.log(date.format('YYYY-MM-DD'));
		}
	});
});
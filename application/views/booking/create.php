<div class="container">
	<div>
	<fieldset>
		<h3>Filtrado</h3>
		Categor&iacute;a

		<select name="categoria" id="categoria">
			<option value="todas" selected>Todas</option>
			<?php foreach ($categorias as $categoria):?>
				<?php foreach($categoria as $categ=>$nombre): ?>
					<option value="<?= $nombre ?>"><?= $nombre ?></option>
				<?php endforeach; ?>
			<?php endforeach;?>
		</select><br><br>

		Red <input type="checkbox" name="red" id="red" /><br>
		Proyector <input type="checkbox" name="proyector" id="proyector" />

		<p>
			<label for="equipos">N&uacute;mero de equipos:</label>
			<input type="text" id="equipos" name="equipos" readonly style="border:0; color:#f6931f; font-weight:bold;">
		</p>

		<div id="sliderEquipos"></div>

		<p>
			<label for="capacidad">Capacidad del aula:</label>
			<input type="text" id="capacidad" name="capacidad" readonly style="border:0; color:#f6931f; font-weight:bold;">
		</p>

		<div id="sliderCapacidad"></div><br><br>

		<input type="submit" value="Enviar" onclick="verOR()" /><br><br>
	</fieldset>
	</div>

	<div  id="contenedor">
		<h3>Aulas disponibles</h3>
		<div id="aulas" name="aulas" ></div>
	</div>

	<div id="aulas" name="aulas" ></div>


	<h1>Date</h1>
	<div id='calendar'></div>
	<div class="modalContainer hidden" id="bookingModal">
		<div class="backdrop"></div>
		<div class="customModal">
			<h2 class="date" id="datePicked"></h2>
			<h2 id="classTB"></h2>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="8:20-9:15"> 8:20-9:15</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="9:15-10:10"> 9:15-10:10</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="10:10-11:00"> 10:10-11:00</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="11:00-11:35"> 11:00-11:35</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="11:35-12:30"> 11:35-12:30</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="12:30-13:25"> 12:30-13:25</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="13:25-14:20"> 13:25-14:20</label>
			</p>
			<p>
				<button class="submit">Confirm booking</button>
			</p>
		</div>
	</div>
</div>

<script type="text/javascript">

/* Javascript */

$(function(){
	var date=new Date();

	$(document).on("click",".classToBook",function(e){
		var classroom=$(this).text();
		$('#classTB').text(classroom)

	});

$(".submit").click(function(){
	//TODO: comprobación de los datos
	var hours=$("#bookingModal .hours:checked");
	var hoursParsed=[];
	var classr=200;

	console.log("LLEGA AQUI");
	for(var i=0; i<hours.length; i++){
		hoursParsed.push($(hours[i]).val());
	}

	$.ajax("<?= base_url() ?>booking/createPost", {
		type: "POST",
		dataType:'json',
		contentType: "application/json",
		data: {
			'date': $("#bookingModal .date").text(),
			'classroom': $("#classTB").text(),
			'hours': hoursParsed
		},
		complete: function(response){
			console.log(hoursParsed);
			console.log("RESPONSE ====== "+response.responseText);
			var result=JSON.parse(response.responseText.to_json);
			console.log(hoursParsed);
			console.log($('#classTB').text());
			console.log($("#bookingModal .date").text());
			console.log("RESULTADO DEL JSON "+result);
			if(result.isValid){
				$("#bookingModal").addClass("hidden");
			}
			else {
				console.log("NO PUDO COMPLETARSE LA RESERVA");
			}
		}
	});
});

	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay',
		},
		/*events: [

                 {
                     title  : 'D�a de Santiago',
                     start  : '2016-05-10',
                     end    : '2016-05-11'
                 }
             ],*/
        lang: 'es',
		firstDay: 1,
		editable: true,
		dayRender: function(date, cell) {
			   $(cell).append("<div class='spheres' value='8:20-9:15'></div><div class='spheres' value='9:15-10:10'></div><div class='spheres' value='10:10-11:00'></div><div class='spheres' value='11:00-11:35'></div><div class='spheres' value='11:35-12:30'></div><div class='spheres' value='12:30-13:25'></div><div class='spheres' value='13:25-14:20'></div>");
			   $(".fc-sun").addClass("disabled").children('.spheres').remove();
			   $(".fc-sat").addClass("disabled").children('.spheres').remove();
			   $(".fc-past").addClass("disabled").children('.spheres').css('background-color', 'blue');
			   $(".fc-other-month").addClass("disabled");
			   $(".spheres").addClass("disabled");
			 //VACACIONES Y FESTIVOS
				diasFestivos=["2016-03-24","2016-03-25","2016-05-02","2016-05-16","2016-10-12","2016-11-01","2016-11-09","2016-12-06","2016-11-08"];
			//rangoVacaciones=["2016-07-01","2016-07-31","2016-08-01/31","2016-09-01/12"];
			for(x=0;x<diasFestivos.length;x++)
			{
			$('td[data-date='+diasFestivos[x]+']').css("background-color","red").addClass("disabled");
			}
			   //Buscaremos las reservas de ese aula al renderizar los d�as
			   $.ajax("<?= base_url() ?>booking/listarReservaPost", {
			    type: "POST",
			    dataType: "json",
			    contentType: "application/json",
			    success: function(data){
			     var length=data.length;
			     for (i=0;i<length;i++) {
			      var post=data[i];
			      $("[data-date="+post.fecha+"]").find(".spheres[value='"+post.hora+"']").val("+post.hora+").css("background-color", "red");
			     }
			    }
			   });
			  },
			  dayClick: function(date, jsEvent, view)
			  {
			   if($(jsEvent.target).hasClass("disabled"))
			   {
			    return false;
			   }
			   else {
			    var modal=$("#bookingModal");
			    modal.find(".date").text(date.format('YYYY-MM-DD'));
			    modal.removeClass("hidden");
			   }
			  }
			 });
			});
			</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/reserva/crear.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="<?= base_url() ?>assets/jquery/jqueryGeneral/jquery-2.1.4.js"></script>
<script src="<?= base_url() ?>assets/jquery/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>assets/jquery/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<script src="<?= base_url() ?>assets/js/reserva/traduccionEspanyol.js"></script>
<script src="<?= base_url() ?>assets/js/reserva/diasFestivos.js"></script>


<script>
$(function reservandoHoras() {
	  $('td').click( function() {
	    $(this).toggleClass("reservando");
	    var horas=document.getElementsByClassName("reservando");
	    var horasCogidas="";
	    for(i=0;i<horas.length;i++)
	    {
	        horasCogidas+=(horas[i].id)+"--";
	        document.getElementById("horaCogida").value=horasCogidas;
	    }
	  } );
} );

$(function () {

    datepickerModelado("#fecha");
    
    $("#mes").on("click", function () {
        $("#fecha2").css("visibility", "visible");
        datepickerModelado("#fecha2");
    })
    $("#anyo").on("click", function () {
        $("#fecha2").css("visibility", "visible");
        datepickerModelado("#fecha2");
    })
    $("#dia").on("click",function (){
        $("#fecha2").datepicker( "destroy" );
        $("#fecha2").css("visibility", "hidden");
    })
    $.datepicker.setDefaults($.datepicker.regional['es']); //Traduccion Español

//FUNCION PARA EL COMPORTAMIENTO DE LOS DATEPICKER
    function datepickerModelado(elDatepicker) {
        $(elDatepicker).datepicker({
            minDate: new Date(),
            buttonImage: "<?= base_url() ?>assets/imagenes/reserva/button-calendar.gif",
            buttonImageOnly: true,
            buttonText: "Abre el calendario",
            showOn: "both",
            beforeShowDay: noWeekendsOrHolidays,
            beforeShowDay: vacaciones,
            numberOfMonths: 2,
            showButtonPanel: true
        })
    };
  
});

</script>
</head>
<body>
<h1>Crear Reserva</h1>
<form action="<?=base_url('reserva/crearPost')?>" method="post">
	<input type="text" name="idUsuario" value="<?= $idUsuario ?>" hidden><br>
	<label>idObjeto Reservable</label> <input type="text" name="idOR"><br>
	<label>Fecha</label>        
	<input type="text" name="fecha" id="fecha">
    <input type="text" name="fecha2" id="fecha2">
    <br>
    <input type="button" value="dia" id="dia">
    <input type="button" value="3 dias" id="3dias">
    <input type="button" value="mes" id="mes">
    <input type="button" value="a&ntilde;o" id="anyo">

	 <br>
	 <br>
	 <br>

<label>Hora</label> <input type="text" name="horaCogidas" id="horaCogida" onchange="function reservandoHoras()"><br>
<table id="tablaHoraria" border="1">
		<tr><td>Horas</td><td>Lunes</td><td>Martes</td><td>Miércoles</td><td>Jueves</td><td>Viernes</td></tr>
		<tr><td id="0.0">8:20-9:15</td><td name="hora" id="8:20"></td><td name="hora" id="8:20"></td><td name="hora" id="8:20"></td><td name="hora" id="8:20" value="miau"></td><td name="hora" id="8:20"></td></tr>
		<tr><td id="0.1">9:15-10:10</td><td name="hora" id="9:15"></td><td name="hora" id="9:15"></td><td name="hora" id="9:15"></td><td name="hora" id="9:15"></td><td name="hora" id="9:15"></td></tr>
		<tr><td id="0.2">10:10-11:05</td><td name="hora" id="10:10"></td><td name="hora" id="10:10"></td><td name="hora" id="10:10"></td><td name="hora" id="10:10"></td><td name="hora" id="10:10"></td></tr>
		<tr><td id="0.3">11:05-11:35</td><td name="hora" id="11:05"></td><td name="hora" id="11:05"></td><td name="hora" id="11:05"></td><td name="hora" id="11:05"></td><td name="hora" id="11:05"></td></tr>
		<tr><td id="0.4">11:35-12:30</td><td name="hora" id="11:35"></td><td name="hora" id="11:35"></td><td name="hora" id="11:35"></td><td name="hora" id="11:35"></td><td name="hora" id="11:35"></td></tr>
		<tr><td id="0.5">12:30-13:25</td><td name="hora" id="12:30"></td><td name="hora" id="12:30"></td><td name="hora" id="12:30"></td><td name="hora" id="12:30"></td><td name="hora" id="12:30"></td></tr>
		<tr><td id="0.6">13:25-14:20</td><td name="hora" id="13:25"></td><td name="hora" id="13:25"></td><td name="hora"  id="13:25"></td><td name="hora" id="13:25"></td><td name="hora" id="13:25"></td></tr>	
	<input type="submit">
	</table>
</form>



</body>
</html>
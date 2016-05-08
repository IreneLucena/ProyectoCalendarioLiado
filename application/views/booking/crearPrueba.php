<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<style type="text/css" src="assets/css/reservandoHoras.css"></style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="assets/jquery/reservandoHoras.js"></script>

</head>
<body>
<h1>Crear Reserva</h1>
<form action="<?=base_url('reserva/crearPost')?>" method="post">
	<input type="text" name="idUsuario" value="<?= $idUsuario ?>" hidden><br>
	<label>idObjeto Reservable</label> <input type="text" name="idOR"><br>
	<label>Fecha</label> <input type="date" name="fecha"><br>
<label>Hora</label> <input type="text" name="hora" id="horaCogida" onchange="function reservandoHoras()"><br>
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
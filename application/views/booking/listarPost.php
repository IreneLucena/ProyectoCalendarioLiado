<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
</head>

<body>
<?php var_dump($reservas);?>
<table border="1">
<tr>
<td><b>Nombre Usuario</b></td>
<td><b>Fecha</b></td>
<td><b>Hora</b></td>
<td><b>Objeto Reservado</b></td>
</tr>
<?php foreach($reservas as $reserva):?>
<tr>
<td><?= $reserva->usuarionombre?></td>
<td><?= $reserva->fecha?></td>
<td><?= $reserva->hora?></td>
<td><?= $reserva->ornombre?></td>
</tr>
<?php endforeach;?>
</table>
</body>
</html>
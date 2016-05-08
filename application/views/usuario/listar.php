<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
  
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/usuario/listar.css">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
 
  </head>

  <body>

<table class="tablaUsu">
  
  <tr class="titulos">
    <td>NOMBRE</td>
    <td>APELLIDOS</td>
    <td>NICK</td>
    <td>EMAIL</td>
  </tr>
  
  <?php foreach($usuarios as $usuario):?>
		<tr>
			<td><?= $usuario->nombre ?></td>
			<td><?= $usuario->apellidos ?></td>
			<td><?= $usuario->nick ?></td>
			<td><?= $usuario->correo ?></td>
		</tr>
	<?php endforeach;?>

</table>

  </body>
</html>

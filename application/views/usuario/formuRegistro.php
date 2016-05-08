<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Añadimos los estilos css de registro -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/usuario/registro.css">
        
        <!-- Añadimos fuentes de letra de google, para que quede más bonito -->
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

		<!-- Añadimos el código javascript de registro -->
 		<script src="<?= base_url() ?>assets/js/usuario/registro.js" type="text/javascript"></script>

    </head>
    <body>

      <form action="<?=base_url('usuario/registrarPost')?>" method="post">
      
        <h1>Registro</h1>

          <legend><span class="number">1</span>Informaci&oacute;n Usuario</legend>
          <label for="name">Nick:</label>
          <input type="text" id="nick" name="nick">
          
          <label for="password">Contrase&ntilde;a:</label>
          <input type="password" id="password" name="password">
          
          <label for="password">Repite la contrase&ntilde;a:</label>
          <input type="password" id="password2" name="password2">
          
          <label for="mail">Email:</label>
          <input type="email" id="correo" name="correo">

          <legend><span class="number">2</span>Clave del centro</legend>
          <label for="name">Clave:</label>
          <input type="text" id="clave" name="clave">
			
		  <input type="text" id="res" name="res" hidden/>
			
        <button type="submit" onclick="registrar()">Registrarse</button>
        
        
      </form>
      
    </body>
</html>


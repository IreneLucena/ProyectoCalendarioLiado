<html>
<head>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  	<!-- A�adimos los estilos de la pantalla de filtrar -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/reserva/filtrar.css" type="text/css">
	<script src="<?= base_url() ?>assets/js/reserva/filtrar.js" type="text/javascript"></script>
	<script type="text/javascript" src="http://form-serialize.googlecode.com/svn/trunk/serialize-0.2.min.js" ></script>


	<!-- A�adimos el c�digo javascript de filtrar -->

	<meta charset="utf-8">

  	<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->

</head>
<body>

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

	
	 
	<div  id="contenedor">
		<h3>Aulas disponibles</h3>
		<div id="aulas" name="aulas" ></div>
	</div>
	
</body>
</html>
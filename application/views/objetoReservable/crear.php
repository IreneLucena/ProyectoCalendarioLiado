
<h1>Crear Objeto</h1>
<form action="<?=base_url('objetoReservable/crearPost')?>" method="post">
	<label>Nombre</label> <input type="text" name="nombre"><br>
	<label>Tipo</label> <input type="text" name="tipo"><br>
	<label>Número de Aula</label> <input type="text" name="num_aula"><br>
	<label>Capacidad</label> <input type="text" name="capacidad"><br>
	<label>Categoría</label> <input type="text" name="categoria"><br>
	<label>Número de Equipos</label> <input type="text" name="num_equipos"><br>
	<label>Red</label> <input type="text" name="red"><br>
	<label>Proyector</label> <input type="text" name="proyector"><br>
	<input type="submit" class="button"><br>
</form>
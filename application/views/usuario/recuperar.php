<form id="restablecerDatos" action="<?=base_url('usuario/recuperarPost')?>" method="post">
Escribe el email asociado a tu cuenta para recuperar tus datos<br>
<input type="email" id="correo" name="correo" required><br>
<input type="submit" class="enviar" value="Recuperar datos" >
</form>
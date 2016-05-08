<!-- Recorremos las aulas disponibles, devueltas por el modelo, y listamos su n�mero de aula -->
<?php foreach ($aulas as $aula):?>
			<?php foreach($aula as $a=>$num): ?>
					<div class="classToBook" value="<?= $num ?>"><?= $num ?></div>
			<?php endforeach; ?>
<?php endforeach;?>

<a href="<?=base_url('booking/create')?>">Buscar m&aacute;s aulas</a>

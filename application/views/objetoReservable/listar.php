<table>
	<tr><td>Num Aula</td><td>Nombre</td></tr>
	
	<?php foreach($objetos as $objeto):?>
	
		<tr><td><?= $objeto->num_aula ?></td>
		
		<!-- Si el nombre es null mostrará aula nombreCategoría (ej: aula multimedia) -->
		<?php if($objeto->nombre== null):?>
			<td><?= $objeto->tipo." ".$objeto->categoria?></td>
		<?php endif;?>
		
		<!-- Esta línea de debajo sería la parte del else -->
		<td><?= $objeto->nombre ?></td></tr>
		
	<?php endforeach;?>
	
</table>
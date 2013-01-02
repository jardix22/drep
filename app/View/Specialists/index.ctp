<?php //print_r($specialists); ?>

<h2>Especialistas</h2>
<table class="table">
	<thead>
		<tr>
			<th>Num.</th>
			<th>Ugel</th>
			<th>Nombres y Apellidos</th>
			<th>Nombre de Usuario</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1;?>
		<?php foreach ($specialists as $specialist): ?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $specialist['Ugel']['name']; ?></td>
			<td><?php echo $specialist['Person']['names'];?></td>
			<td><?php echo $specialist['User']['username'];?></td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>

<?php
	echo $this->Html->link('Registrar especialista', array('action' => 'add'), array('class' => 'btn'))
?>
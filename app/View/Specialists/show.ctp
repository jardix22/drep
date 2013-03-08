<?php //print_r($specialist); ?>

<?php $this->Html->addCrumb( 'UGELS', '/ugels/'); ?>
<?php $this->Html->addCrumb( strtoupper($specialist['Ugel']['name']) ,  '/ugels/show/'.$specialist['Ugel']['id']); ?>
<?php $this->Html->addCrumb( 'DETALLES' , null); ?>

<h3>
	<?php echo $specialist['Code']['description'];?>
	<div class="pull-right">
		<?php echo $this->Html->link('Regresar', array('controller' => 'ugels', 'action' => 'show', $ugelId), array('class' => 'btn')) ?>
	</div>
</h3>
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
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $specialist['Ugel']['name']; ?></td>
			<td><?php echo $specialist['Person']['names'];?></td>
			<td><?php echo $specialist['User']['username'];?></td>
		</tr>
	</tbody>
</table>


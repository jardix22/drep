<?php $this->Html->addCrumb( 'UGELS', '/ugels/'); ?>
<?php $this->Html->addCrumb( strtoupper($ugel['Ugel']['name']), null); ?>

<div class="page-header">
	<h3>
		Lista de Especialistas
		<div class="pull-right">
			<?php echo $this->Html->link('Regresar', array('controller' => 'ugels', 'action' => 'index'), array('class' => 'btn')); ?>
		</div>
	</h3>
</div>
<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Especialistas</th>
			<th>Persona</th>
			<th>Acciones</th>
		</tr>	
	</thead>
	<tbody>
		<?php foreach ($specialists as $key => $specialist): ?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $specialist['Code']['description'];?></td>
				<td><?php  echo $retVal = ($specialist['State'] == true) ?  $specialist['Person']['names'] : '' ;?></td>

				<td><?php  echo $action = ($specialist['State'] == true) ?  $this->Html->link("Detalles", array('controller' => 'specialists', 'action' => 'show', $ugel['Ugel']['id'], $specialist['Code']['id'])) : $this->Html->link("Registrar", array('controller' => 'specialists', 'action' => 'add', $ugel['Ugel']['id'], $specialist['Code']['id']));?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
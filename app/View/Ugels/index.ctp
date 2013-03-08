<?php $this->Html->addCrumb( 'UGELS', null); ?>

<div class="page-header">
	<h4>UGELS</h4>
</div>
<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Ugel</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($ugels as $key => $ugel): ?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $ugel['Ugel']['name'];?></td>
				<td>
					<?php echo $this->Html->link("Detalles", array('action' => 'show', $ugel['Ugel']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
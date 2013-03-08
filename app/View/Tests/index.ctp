<?php $this->Html->addCrumb( 'TESTS', null); ?>

<h3>
	Tests
	<div class="pull-right">
		<?php echo $this->Html->link("Crear Test", array('action' => 'add'), array('class' => 'btn'))?>
	</div>
</h3>
<table class='table'>
	<thead>
		<tr>
			<th>Nº</th>
			<th>Titulo</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; ?>
		<?php foreach($tests as $test): ?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $test['Test']['title']; ?></td>
				<td><?php echo $this->Html->link('Estructurar', array('action' => 'build', $test['Test']['id'] )); ?></td>
				<td><?php echo $this->Html->link('Vista previa', array('action' => 'preview', $test['Test']['id'] )); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>


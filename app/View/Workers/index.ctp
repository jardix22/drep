<?php $subTitle = array( 
		1 => array('l' => 'Docentes de Nivel Inicial', 's' => 'INICIAL'),
		2 => array('l' => ' Docentes de Nivel Primaria', 's' => 'PRIMARIA'),
		3 => array('l' => 'Docentes de Nivel Secundaria', 's' => 'SECUNDARIA'),
		4 => array('l' => 'Directores' , 's' => 'DIRECTORES')
	); 
?>

<?php // print_r($workers); ?>

<?php $this->Html->addCrumb($subTitle[$type]['s'], '/home/institution/'. $type); ?>
<?php $this->Html->addCrumb($institution['Institution']['name'], null); ?>


<div class="page-header">
	<h2>
		
		<?php echo $subTitle[$type]['l']; ?>
		<div class='pull-right'>
			<?php echo $this->Html->link("Evaluar", array('controller' => 'evaluations', 'action' => 'take', $type ), array('class' => 'btn')); ?>
		</div>
	</h2>
</div>


<table class="table table-bordered">
	<thead>
		<tr>
			<th>Num.</th>
			<th>DNI</th>
			<th>Nombre y Apellidos</th>
			<th>Pnt.</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1; ?>
		<?php foreach ($workers as $worker): ?>
			<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $worker['Person']['document'];?></td>
				<td><?php echo $worker['Person']['names'];?></td>
				<td><?php echo $worker['Evaluation'][0]['score'];?></td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>
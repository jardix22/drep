
<?php $subTitle = array( 
	1 => array('l' => 'Instituciones de Nivel Inicial', 's' => 'INICIAL'), 
	2 => array('l' => 'Instituciones de Nivel Primaria', 's' => 'PRIMARIA'), 
	3 => array('l' => 'Instituciones de Nivel Secundaria', 's' => 'SECUNDARIA'), 
	4 => array('l' => 'Lista de Instituciones- Directores', 's' => 'DIRECTORES')
); ?>
	
<?php $this->Html->addCrumb( $subTitle[$levelId]['s'], null, 'Institutions'); ?>

<div class="page-header">
	<h3><?php echo $subTitle[$levelId]['l']; ?></h3>
</div>
<table id="institution-table">
	<thead>
		<tr>
			<th>#</th>
			<th>Codigo</th>
			<th>Id</th>
			<th>I.E</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1;?>
		<?php foreach ($institutions as $institution): ?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $institution['Institution']['code']; ?></td>
				<td><?php echo $institution['Institution']['id']; ?></td>
				<td><?php echo $institution['Institution']['name']; ?></td>
			<!--
				<td><?php echo $this->Html->link('ver', array('controller' => 'workers', 'action' => 'index', '?' => array('type' => $levelId, 'institution' => $institution['Institution']['id']))); ?></td>
			-->
			<!--
				<td><?php echo $this->Html->link('Evaluar Director', array('controller' => 'directors', 'action' => 'evaluation', '?' => array('type' => $levelId, 'institution' => $institution['Institution']['id']))); ?></td>
			-->
				<td><?php echo $this->Html->link('Detalles', array('controller' => 'directors', 'action' => 'detail', $institution['Institution']['id'])); ?></td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>

<?php echo $this->Html->script('/bootstrap/js/core/jquery.dataTables'); ?>

<script type="text/javascript">
	$(document).ready(function () {
		$("#institution-table").dataTable({
			"oLanguage": {
                "sUrl": "/drep/bootstrap/js/es/dataTables.spanish.txt"
            },
            sPaginationType: "full_numbers"
        });
	});
</script>
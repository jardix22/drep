<?php 
	$i = $j = 1;
	$subTitle = array(1 => 'INICIAL', 3 => 'SECUNDARIA', 2 => 'PRIMARIA', 4 => 'DIRECTORES');
	$p = array(1 => 'PRIMERA', 2 => 'SEGUNDA', 3 => 'TERCERA', 4 => 'CUARTA');
	$r = array(1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V',  6 => 'VI', 7 => 'VII');
?>

<?php $this->Html->addCrumb( $subTitle[$institution['Institution']['level_id']], '/home/institution/'.$institution['Institution']['level_id']); ?>
<?php $this->Html->addCrumb($institution['Institution']['name'],null); ?>
<?php $this->Html->addCrumb("DIRECTOR", "/directors/detail/". $institution['Institution']['id']); ?>
<?php $this->Html->addCrumb("EVALUACIÓN", null); ?>


<?php echo $this->Form->create(array('action' => 'saveDirector', 'class' => 'form-horizontal')); ?>

	<div class="page-header">
		<h3><?php echo $test['Test']['title']?></h3>
	</div>

	<div class="valuation-block">
		<p>
			<i>
				Marque con aspa la valoración que corresponda al criterio, de acuerdo con la tabla de equivalencia siguiente:
			</i>
		</p>
		<table class='table table-condensed table-bordered' style='width: 300px;'>
			<thead>
				<th>Escala</th>
				<th>Equivalencia</th>
			</thead>
			<tbody>
				<tr><td>0</td><td>No cumple</td></tr>
				<tr><td>1</td><td>En inicio</td></tr>
				<tr><td>2</td><td>En proceso</td></tr>
				<tr><td>3</td><td>Satisfactorio</td></tr>
			</tbody>
		</table>
	</div>

	<?php echo $this->Form->hidden('Worker.institution_id', array('value' => $institution['Institution']['id'])); ?>
	<?php echo $this->Form->hidden('test_id', array('value' => $test['Test']['id'])); ?>

	<?php foreach ($test['Part'] as $part): ?>
		<table class='table table-bordered table-hover'>
			<thead>
				<th><h4><?php echo $p[$i++] . " PARTE";?></h4></th>
			</thead>
			<tbody>
					<?php foreach ($part['Block'] as $block): ?>
						<tr class='question-title' style="background-color: #ececec;" >
							<td ><?php echo $r[$j++].'. '.$block['name']; ?></td>
							<td>0</td>
							<td>1</td>
							<td>2</td>
							<td>3</td>
							<!--<td>Pts.</td>-->
						</tr>
						<?php foreach ($block['Question'] as $question): ?>
							<tr>
								<td><?php echo $question['description']; ?></td>
								<td><input type='radio' value="0" name=<?php echo 'data[Question]['.$question['id'].']';?> checked ></td>
								<td><input type='radio' value="1" name=<?php echo 'data[Question]['.$question['id'].']';?>></td>
								<td><input type='radio' value="2" name=<?php echo 'data[Question]['.$question['id'].']';?>></td>
								<td><input type='radio' value="3" name=<?php echo 'data[Question]['.$question['id'].']';?>></td>
								<!--<td>12</td>-->
							</tr>
						<?php endforeach; ?>
					<?php endforeach; ?>
			</tbody>
		</table>
	<?php endforeach; ?>
	<div>
		<label><b>Observaciones:</b></label>
		<?php echo $this->Form->textarea('observation', array('style' => "height: 100px;", 'class' => 'span12')); ?>
	</div>

	<div class="form-actions">
		<button type="submit" class="btn btn-primary" id="evaluation-submit">Guardar</button>
		<input type="reset" value="Limpiar" class="btn">
	</div>
<?php echo $this->Form->end(); ?>


<style type="text/css">
	.question-title{
		font-weight: bold;
	}
</style>
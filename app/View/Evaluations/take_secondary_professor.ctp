<pre>
	<?php print_r($curricularAreas)?>
</pre>
<?php 
	$i = $j = 1;
	$subTitle = array(1 => 'INICIAL', 3 => 'SECUNDARIA', 2 => 'PRIMARIA', 4 => 'DIRECTORES');
	$p = array(1 => 'PRIMERA', 2 => 'SEGUNDA', 3 => 'TERCERA', 4 => 'CUARTA');
	$r = array(1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V',  6 => 'VI', 7 => 'VII');
?>
	
<?php $this->Html->addCrumb($institution['Institution']['name'], "/workers/index/"); ?>
<?php $this->Html->addCrumb("EVALUACIÓN", null); ?>

<?php echo $this->Form->create(array('action' => 'saveSecondaryProfessor', 'class' => 'form-horizontal')); ?>

	<div class="page-header">
		<h3><?php echo $test['Test']['title']?></h3>
	</div>

	<h5>Datos del Docente: </h5>
	<?php echo $this->BtForm->input('Person.document', 'DNI', array('autocomplete' => 'off')); ?>
	<?php echo $this->BtForm->input('Person.names', 'Nombres y Apellidos', array('class' => 'span7')); ?>
	<?php echo $this->BtForm->input('Worker.curricular_area_id', 'Area Curricular', array('class' => 'span7')); ?>
	<?php echo $this->BtForm->input('Worker.experience_time', 'Años de Experiencia'); ?>

	<hr>
	<h5>Datos de Clase: </h5>
	<?php echo $this->BtForm->input('Class.male_student_number', 'Nº de alumnos matriculados', array('autocomplete' => 'off')); ?>
	<?php echo $this->BtForm->input('Class.female_student_number', 'Nº de alumnas matriculados', array('autocomplete' => 'off')); ?>
	

	<hr>

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
		<table class='table table-bordered table-hover table-question'>
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
								<?php if ($question['is_question'] == 1): ?> 
									<tr class="td-question" >
										<td ><?php echo $question['description']; ?></td>
										<td><input type='radio' value="0" name=<?php echo 'data[Question]['.$question['id'].']';?> checked ></td>
										<td><input type='radio' value="1" name=<?php echo 'data[Question]['.$question['id'].']';?>></td>
										<td><input type='radio' value="2" name=<?php echo 'data[Question]['.$question['id'].']';?>></td>
										<td><input type='radio' value="3" name=<?php echo 'data[Question]['.$question['id'].']';?>></td>
										<!--<td>12</td>-->
									</tr>
								<?php elseif ($question['is_question'] == 3): ?> 
									<tr class="td-sub-question" >
										<td><?php echo $question['description']; ?></td>
										<td><input type='radio' value="0" name=<?php echo 'data[Question]['.$question['id'].']';?> checked ></td>
										<td><input type='radio' value="1" name=<?php echo 'data[Question]['.$question['id'].']';?>></td>
										<td><input type='radio' value="2" name=<?php echo 'data[Question]['.$question['id'].']';?>></td>
										<td><input type='radio' value="3" name=<?php echo 'data[Question]['.$question['id'].']';?>></td>
										<!--<td>12</td>-->
									</tr>
								<?php else: ?> 
									<tr class="td-subtitle">
										<td><?php echo $question['description']; ?></td>
										<td colspan="4"></td>										
									</tr>
								<?php endif;?>
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

<script type="text/javascript">
	$(document).ready(function () {

		$.validator.addMethod("uniqueUserName", function(value, element) {
			var isSuccess = false;

			$.ajax({
				type: "POST",
				url: "/drep/validates/checkUser",
				data: { 'term': value},
				async: false,
				dataType: 'json',
				success: function(data)
				{
				 	isSuccess = data.isUnique;
				}
			});
			if (!isSuccess) {
				$(element).closest('.control-group').removeClass('success');
				$(element).closest('.control-group').addClass('error');
			}
			return isSuccess;

		}, "El numero de DNI fue registrado.");

		$('#evaluation-submit').on('click', function (e) {

			$("#EvaluationSaveForm").validate({
				rules:{
					"data[Person][document]": {
						required: true,
						digits: true,
						minlength: 8,
						uniqueUserName: true
					},
					"data[Person][names]": {
						required: true
					}	
				},
				highlight: function(label) {
					$(label).closest('.control-group').addClass('error');
				},
				success: function(label) {
					label
						.text('OK!').addClass('valid')
						.closest('.control-group').addClass('success');
				}
			});
		});
	});
</script>
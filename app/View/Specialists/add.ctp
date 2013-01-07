<h2>Registrar Nuevo Especialista</h2>
	
	<?php echo $this->BtForm->create(array('action' => 'save')); ?>
	
	<fieldset>
		<legend>Ugel</legend>
		<?php echo $this->BtForm->input('ugel_id', 'Ugel', array('empty' => '(selecione)')); ?>
	</fieldset>

	<fieldset>
		<legend>Tipo de Especialista</legend>
		<?php echo $this->BtForm->input('code_id', 'Tipo', array('empty' => '(selecione)')); ?>
	</fieldset>

	<fieldset>
		<legend>Datos personales</legend>
		<?php echo $this->BtForm->input('Person.document', 'DNI'); ?>
		<?php echo $this->BtForm->input('Person.names', 'Nombres y Apellidos'); ?>
		<?php echo $this->BtForm->input('Person.address', 'Dirección'); ?>
	</fieldset>

	<fieldset>
		<legend>Datos de usuario</legend>
		<?php echo $this->BtForm->input('User.username', 'Nombre de Usuario'); ?>
		<?php echo $this->BtForm->input('User.password', 'Contraceña'); ?>
		<?php echo $this->BtForm->input('User.password_confirmation', 'Re-contraceña', array('type' => 'password')); ?>
	</fieldset>

	<?php echo $this->BtForm->submit('Registrar'); ?>

<?php echo $this->Form->end(); ?>

<script type="text/javascript">

	$(document).ready(function () {
		$('#SpecialistSaveForm').validate({

		});
	/*
		$('#person_autocomplete').autocomplete({    		
			minLength: 8,
			source: function( request, response ) {
				a = $.ajax({
						url: '/drep/autoComplete/person',
						dataType: "json",
						data: {								
								maxRows: 5,
								term: request.term
						},
						beforeSend: function () {
								$("#load_1").css('display','inline-block');
							},
							complete: function () {
								$("#load_1").hide();
							},
						success: function( data ) {
							
							if (data.length == 0) { 
								$("#person_names").val('').attr('disabled', false).focus();
								$("#person_lf_name").val('').attr('disabled', false);
								$("#person_lm_name").val('').attr('disabled', false);
								$("#person_address").val('').attr('disabled', false);

								return false;
							};

							a = $.map( data, function (item) {
									return { 
										label: item.Medicamento['document'], 
										value: item.Medicamento['document'],
										id:    item.Medicamento['id'],
										names: item.Medicamento['names'],
										lf_name:  item.Medicamento['lf_name'],
										lm_name:  item.Medicamento['lf_name']
									};
							});
							response(a);
						}
				});
			},
			focus: function( event, ui ) {
				$( "#medicament_autocomplete" ).val( ui.item.label );
				return false;
			},
			select: function( event, ui ) {	
				$("#medicament_autocomplete" ).val( ui.item.label );
				/*
				$("#medicamento-id").val(ui.item.id);
				$("#precio").val(ui.item.price);
				$("#codigo").val(ui.item.code);
				$("#stock").html(ui.item.stock);
				$("#cantidad").attr('disabled', false).focus();
				return false;
			}
		});
				*/
	/*
		$("#person_autocomplete").on('focus' function () {
			if () {
				$("#person_names").val('').attr('disabled', true);
				$("#person_lf_name").val('').attr('disabled', true);
				$("#person_lm_name").val('').attr('disabled', true);
				$("#person_address").val('').attr('disabled', true);
			};
		});
	*/
	});
</script>


<?php //echo $this->Form->hidden('Person.id', array('id' => 'person_id')); ?>
		
		<!--
		<div class="control-group">
			<label class="control-label" for="inputPassword">Password</label>
			<div class="controls">
				<?php //echo $this->Form->input('Person.document', array('id' => 'person_autocomplete', 'autocomplete' => 'off', 'class'=> "span3", 'label'=>false, 'div' => false)); ?>
				<div id="load_1" class="loading" style="display: none;"><?php //echo $this->Html->image("/bootstrap/img/ajax-loader.gif"); ?></div>
			</div>
		</div>
		-->
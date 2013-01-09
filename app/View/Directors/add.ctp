<?php $subTitle = array(1 => 'INICIAL', 3 => 'SECUNDARIA', 2 => 'PRIMARIA', 4 => 'DIRECTORES'); ?>


<?php $this->Html->addCrumb( $subTitle[$institution['Institution']['level_id']], '/home/institution/'.$institution['Institution']['level_id']); ?>
<?php $this->Html->addCrumb($institution['Institution']['name'],null); ?>
<?php $this->Html->addCrumb("DIRECTOR", "/directors/detail/". $institution['Institution']['id']); ?>
<?php $this->Html->addCrumb("REGISTRO", null); ?>

<h2>Registrar Director</h2>
	
	<?php echo $this->BtForm->create(); ?>

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
		$('#DirectorAddForm').validate({
		});
	});
</script>
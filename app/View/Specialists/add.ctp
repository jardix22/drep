<?php $this->Html->addCrumb( 'UGELS', '/ugels/'); ?>
<?php $this->Html->addCrumb( strtoupper($ugel['name']), '/ugels/show/'.$ugel['id']); ?>
<?php $this->Html->addCrumb( 'REGISTRO', null); ?>

<h2>Registrar <?php echo $code['Code']['description']?></h2>
	
<?php echo $this->BtForm->create(); ?>
	<?php echo $this->Form->hidden('code_id',array('value' => $codeId)); ?>
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
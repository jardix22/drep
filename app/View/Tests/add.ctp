<h2>Test</h2>
<?php echo $this->Form->create('Test', array('action' => 'save'), array('class' => 'form-horizontal')); ?>
<?php echo $this->BtForm->input('title', 'Nombre');?>
<?php echo $this->BtForm->submit('Guardar');?>
<?php echo $this->Form->end(); ?>
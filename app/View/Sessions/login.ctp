<?php echo $this->Form->create(null, array('class'=>'form-signin')); ?>
	<div class="page-header">
		<h4 class="form-signin-heading">Sistema de Monitoreo</h4>
	</div>

	<div id='login-input-wrapper'>
		<div class='login-input'>
			<?php echo $this->Form->input('username', array('id'=>'da-login-username', 'placeholder'=>'Usuario', 'label'=> false, 'div' => false, 'class' => 'input-block-level', 'autocomplete' => 'off' )); ?>
		</div>
		<div class='login-input'>
			<?php echo $this->Form->input('password', array('id'=>'da-login-password', 'placeholder'=>'Contraseña', 'label'=> false, 'div' => false, 'class' => 'input-block-level')); ?>
		</div>
	</div>
	<!--
	<label class="checkbox">
	  <input type="checkbox" value="remember-me"> Remember me
	</label>
-->
	<div id='login-button'>
		<?php echo $this->Form->submit('Iniciar Sesión', array('class'=>'btn btn-primary')); ?>
	</div>
	
<?php echo $this->Form->end(); ?>
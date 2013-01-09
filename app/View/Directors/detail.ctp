<?php $subTitle = array(1 => 'INICIAL', 3 => 'SECUNDARIA', 2 => 'PRIMARIA', 4 => 'DIRECTORES'); ?>

<?php $this->Html->addCrumb( $subTitle[$institution['Institution']['level_id']], '/home/institution/'.$institution['Institution']['level_id']); ?>
<?php $this->Html->addCrumb($institution['Institution']['name'], null); ?>
<?php $this->Html->addCrumb("DIRECTOR", null); ?>

<?php if(!$existDirector): ?>
	<div class="alert alert-info fade in">
		<p>
			<strong>Aviso!</strong> El director de la Institucion Educativa no ha sido registrado.
		</p>
		<p >
			<?php echo $this->Html->link("Registrar", array('controller' => 'directors', 'action' => 'add'), array( 'class' => 'btn btn-primary')); ?>
		</p>
	</div>
<?php else: ?>
	<?php if (!$isEvaluate): ?>
		<div class="alert alert-info fade in">
			<strong>Aviso!</strong> El director de la Institucion Educativa no ha sido evaluado.
		</div>
	<?php endif; ?>
	<div class="page-header">
		<h3>Datos de Director
			<div class="pull-right">
				<?php 
					if (!$isEvaluate) {
						echo $this->Html->link("Evaluar", array('controller' => 'evaluations', 'action' => 'takeDirector', 4, $director['Worker']['id']), array( 'class' => 'btn')); 
					}
				?>
			</div>
		</h3>
	</div>
	<dl class="dl-horizontal">
		<dt>I.E.</dt>
		<dd><?php echo $director['Institution']['name']; ?></dd>

		<dt>Código Modular</dt>
		<dd><?php echo $director['Institution']['code']; ?></dd>

		<hr>

		<dt>DNI</dt>
		<dd><?php echo $director['Person']['document']; ?></dd>

		<dt>Nombre y Apelidos</dt>
		<dd><?php echo $director['Person']['names']; ?></dd>

		<dt>Nota</dt>
		<dd><?php echo $score = ($isEvaluate)? $score['Evaluation']['score'] : 'sin nota';	?>
		</dd>

		<hr>
	</dl>
<?php endif; ?>
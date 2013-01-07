<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Sign in &middot; Twitter Bootstrap</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- Le styles -->

		<?php echo $this->Html->css('/bootstrap/css/bootstrap.min'); ?>
		<?php echo $this->Html->css('/bootstrap/css/bootstrap-responsive.min'); ?>
		<?php echo $this->Html->css('/bootstrap/css/bootstrap-validate'); ?>

		<?php echo $this->Html->css('/myDrepTheme/css/master'); ?>
		<?php echo $this->Html->css('/bootstrap/css/core/jquery.dataTables'); ?>

		<?php echo $this->Html->script('/bootstrap/js/core/jquery-1.8.3.min'); ?>
		<?php echo $this->Html->script('/bootstrap/js/core/jquery-ui.min'); ?>
		<?php echo $this->Html->script("/bootstrap/js/core/jquery.validate.min"); ?>
		<?php echo $this->Html->script('/bootstrap/js/es/validate'); ?>
	</head>
	<body>
		<header class="main-header">
			<div class="navbar navbar-fixed-top" style="position: static;">
				<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="#">DREP</a>
					<div class="nav-collapse collapse navbar-inverse-collapse">
						<ul class="nav">

							<?php if ($current_user['role'] == 'A'): ?>
								<li><a href=<?php echo $this->Html->url('/');?>>Inicio</a></li>
								<li><a href=<? echo $this->Html->url(array('controller' => 'tests', 'action' => 'index'))?>>Tests</a></li>
								<li><a href=<? echo $this->Html->url(array('controller' => 'specialists', 'action' => 'index')); ?>>Especialistas</a></li>
							<?php else: ;?>
								<li><?php echo $this->Html->link("Inicial", array('controller' => 'home','action' => 'institution', 1 ))?></li>
								<li><?php echo $this->Html->link("Primaria", array('controller' => 'home','action' => 'institution', 2 ))?></li>
								<li><?php echo $this->Html->link("Secundaria", array('controller' => 'home','action' => 'institution', 3 ))?></li>
								<!--<li><?php //echo $this->Html->link("Directores", array('controller' => 'home','action' => 'institution', 4 ))?></li>-->
							<?php endif;?>
							<!--<li class="divider-vertical"></li>-->
						</ul>

						<ul class="nav pull-right">
							<li class="divider-vertical"></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $current_user['username'] ?> <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<!--
									<li><a href="#">Perfil</a></li>
									<li><a href="#">Something</a></li>
									<li class="divider"></li>
									-->
									<li>
										<?php echo $this->Html->link('Salir', array('controller' => 'sessions', 'action' => 'logout')); ?>									
									</li>
								</ul>
							</li>
						</ul>
											
					</div><!-- /.nav-collapse -->
				</div>
				</div><!-- /navbar-inner -->
			</div><!-- /navbar -->		
		</header>
		<div class="crumb-content">
			<div class="container">
				<div class="breadcrumb cake-breadcrumb">
					<?php echo $this->Html->getCrumbs("<span class='divider'>/</span>",null, null); ?>
				</div>
				<!--
				<ul class="breadcrumb">
					<li><a href="#">Inicio</a> <span class="divider">/</span></li>
					<li><a href="#">Library</a> <span class="divider">/</span></li>
					<li class="active">Data</li>
				</ul>
				-->
			</div>
		</div>


		<div class="container main-container">
			<div class="row">
				<div class="span12">
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</div> <!-- /container -->

		<footer class="footer">
	<!--  	<p> Direccion Regional de la Produccion </p>
			<p> Jr. sol 1036 - Puno Teléfono 051-363550 </p>
			<p>
				E-mail: direpro@puno.gob.pe  | Correo Electrónico Institucional
				<a href=" http://www.unapsegundafie@edu.pe" target="_blank">
					<img src="imagenes/email.jpg" alt="Correo electrónico Institucional">
				</a>
			</p>	-->
		</footer>
		<?php echo $this->element('sql_dump'); ?>
			
		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->

		<?php echo $this->Html->script('/bootstrap/js/bootstrap-transition'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-alert'); ?>
		<?php //echo $this->Html->script('/bootstrap/js/bootstrap-modal'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-dropdown'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-scrollspy'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-tab'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-tooltip'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-popover'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-button'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-collapse'); ?>
		<?php // echo $this->Html->script('/bootstrap/js/bootstrap-carousel'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-typeahead'); ?>

	</body>
</html>

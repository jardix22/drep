<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <title>Sign in &middot; Twitter Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->

    <?php echo $this->Html->css('/bootstrap/css/bootstrap'); ?>
    
	</head>
	<body>

		<div class="container">
      <?php echo $this->fetch('content'); ?>
    </div> <!-- /container -->

		<?php echo $this->element('sql_dump'); ?>
			
		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->

		<?php echo $this->Html->script('/bootstrap/js/jquery'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-transition'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-alert'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-modal'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-dropdown'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-scrollspy'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-tab'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-tooltip'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-popover'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-button'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-collapse'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-carousel'); ?>
		<?php echo $this->Html->script('/bootstrap/js/bootstrap-typeahead'); ?>

	</body>
</html>

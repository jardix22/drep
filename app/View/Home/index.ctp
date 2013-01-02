<ul class="nav nav-tabs nav-stacked">
	<li><?php echo $this->Html->link("Inicial", array('action' => 'institution', 1 ))?></li>
	<li><?php echo $this->Html->link("Primaria", array('action' => 'institution', 2 ))?></li>
	<li><?php echo $this->Html->link("Secundaria", array('action' => 'institution', 3 ))?></li>
	<li><?php echo $this->Html->link("Directores", array('action' => 'institution', 4 ))?></li>
</ul>

<pre>
	<?php print_r($this->Session->read('currentSpecialist')); ?>
</pre>

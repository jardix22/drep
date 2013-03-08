<?php

class Evaluation extends AppModel
{
	
	public $hasOne = array('Class');
	public $belongsTo = array('Test', 'Worker');
}
?>
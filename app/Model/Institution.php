<?php
/**
* 
*/
class Institution extends AppModel
{
	public $hasMany = 'Worker';
	public $belongTo = array('Level', 'Ugel', 'Management');
}
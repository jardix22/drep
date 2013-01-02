<?php
/**
* 
*/
class Specialist extends AppModel
{
	public $belongsTo = array('User', 'Person', 'Ugel');
}

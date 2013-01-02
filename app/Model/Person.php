<?php
class Person extends AppModel
{
	public $name = 'Person';

	public $validate = array(
		'document' => array('rule' =>'notEmpty'),
		'names' => array('rule' =>'notEmpty')
	);
}

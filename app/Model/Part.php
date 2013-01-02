<?php
/**
* 
*/
class Part extends AppModel
{
	public $hasMany = array('Block', 'Valuation');
	public $belongsTo = 'Test';
	//public $hasOne = ;
}

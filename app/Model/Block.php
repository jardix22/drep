<?php
/**
* 
*/
class Block extends AppModel
{
	public $hasMany = 'Question';
	public $belongsTo = 'Part';
}

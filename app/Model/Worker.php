<?php
	class Worker extends AppModel
	{
		public $hasMany = 'Evaluation';
		public $belongsTo = array('Institution', 'Person');
	}

<?php
	class Worker extends AppModel
	{
		public $hasMany = array('Evaluation', 'Director');
		public $belongsTo = array('Institution', 'Person');
	}

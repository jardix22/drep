<?php
	class Director extends AppModel
	{
		public $belongsTo = array('User', 'Worker');
	}
<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

return array(
	
	'/admin/module/polls' => array(
		'controller' => 'Admin:Browser@indexAction'
	),
	
	'/admin/module/polls/answer/add' => array(
		'controller' => 'Admin:Answer:Add@indexAction'
	),
	
	'/admin/module/polls/answer/add.ajax' => array(
		'Admin:Answer:Add' => 'addAction'
	),
);


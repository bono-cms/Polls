<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Polls\Controller\Admin\Answer;

use Cms\Controller\Admin\AbstractController;

final class Edit extends AbstractController
{
	/**
	 * Shows edit form
	 * 
	 * @param string $id
	 * @return string
	 */
	public function indexAction($id)
	{
	}

	/**
	 * Updates a record
	 * 
	 * @return string
	 */
	public function updateAction()
	{
		if ($this->request->isPost() && $this->request->isAjax()) {
			
		}
	}
}

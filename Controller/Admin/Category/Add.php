<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Polls\Controller\Admin\Category;

use Cms\Controller\Admin\AbstractController;

final class Add extends AbstractController
{
	/**
	 * Shows adding form
	 * 
	 * @return string
	 */
	public function indexAction()
	{
	}

	/**
	 * Adds a category
	 * 
	 * @return string
	 */
	public function addAction()
	{
		if ($this->request->isPost() && $this->request->isAjax()) {
		}
	}
}

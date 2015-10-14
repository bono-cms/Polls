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

use Krystal\Stdlib\VirtualEntity;

final class Add extends AbstractCategory
{
	/**
	 * Shows adding form
	 * 
	 * @return string
	 */
	public function indexAction()
	{
		$category = new VirtualEntity();

		return $this->view->render('category.form', array(
			'title' => 'Add category',
			'category' => $category
		));
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

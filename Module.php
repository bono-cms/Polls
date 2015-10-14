<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Polls;

use Cms\AbstractCmsModule;
use Cms\Service\CategoryManager;

final class Module extends AbstractCmsModule
{
	/**
	 * {@inhertiDco}
	 */
	public function getServiceProviders()
	{
		$categoryMapper = $this->getMapper('/Polls/Storage/MySQL/CategoryMapper');
		$categoryManager = new CategoryManager($categoryMapper);

		return array(
			'categoryManager' => $categoryManager
		);
	}
}

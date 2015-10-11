<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Polls\Service;

use Admin\Service\AbstractManager;
use Polls\Storage\AnswerMapperInterface;

final class CategoryManager extends AbstractManager
{
	/**
	 * @var CategoryMapperInterface
	 */
	private $categoryMapper;

	/**
	 * State initialization
	 * 
	 * @param CategoryMapperInterface $categoryMapper
	 * @return void
	 */
	public function __construct($categoryMapper)
	{
		$this->categoryMapper = $categoryMapper;
	}

	/**
	 * Deletes a record by its associated id
	 * 
	 * @param string $id
	 * @return boolean
	 */
	public function deleteById($id)
	{
	}

	/**
	 * Adds a record
	 * 
	 * @param stdclass $container
	 * @return boolean
	 */
	public function add(stdclass $container)
	{
	}

	/**
	 * Updates a record
	 * 
	 * @param stdclass $container
	 * @return boolean
	 */
	public function update(stdclass $container)
	{
	}
}

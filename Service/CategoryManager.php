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

use Cms\Service\AbstractManager;
use Polls\Storage\CategoryMapperInterface;
use Krystal\Stdlib\VirtualEntity;

final class CategoryManager extends AbstractManager implements CategoryManagerInterface
{
	/**
	 * Any compliant category mapper
	 * 
	 * @var \Polls\Storage\CategoryMapperInterface
	 */
	private $categoryMapper;

	/**
	 * State initialization
	 * 
	 * @param \Polls\Storage\CategoryMapperInterface $categoryMapper
	 * @return void
	 */
	public function __construct(CategoryMapperInterface $categoryMapper)
	{
		$this->categoryMapper = $categoryMapper;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function toEntity(array $category)
	{
		$category = new VirtualEntity();
		return $category;
	}

	/**
	 * Fetches all categories
	 * 
	 * @return array
	 */
	public function fetchAll()
	{
	}

	/**
	 * Deletes a category by its associated id
	 * 
	 * @param string $id
	 * @return boolean
	 */
	public function deleteById($id)
	{
	}

	/**
	 * Adds a category
	 * 
	 * @param array $input Raw input data
	 * @return boolean
	 */
	public function add(array $input)
	{
	}

	/**
	 * Updates a category
	 * 
	 * @param array $input Raw input data
	 * @return boolean
	 */
	public function update(array $input)
	{
	}
}

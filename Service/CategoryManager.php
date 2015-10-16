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
		$category->setId($category['id'])
				 ->setName($category['name']);

		return $category;
	}

	/**
	 * Returns last category id
	 * 
	 * @return integer
	 */
	public function getLastId()
	{
		return $this->categoryMapper->getLastId();
	}

	/**
	 * Fetches all categories
	 * 
	 * @return array
	 */
	public function fetchAll()
	{
		return $this->prepareResults($this->categoryMapper->fetchAll());
	}

	/**
	 * Deletes a category by its associated id
	 * 
	 * @param string $id
	 * @return boolean
	 */
	public function deleteById($id)
	{
		return $this->categoryMapper->deleteById($id);
	}

	/**
	 * Adds a category
	 * 
	 * @param array $input Raw input data
	 * @return boolean
	 */
	public function add(array $input)
	{
		return $this->categoryMapper->insert($input);
	}

	/**
	 * Updates a category
	 * 
	 * @param array $input Raw input data
	 * @return boolean
	 */
	public function update(array $input)
	{
		return $this->categoryMapper->update($input);
	}
}

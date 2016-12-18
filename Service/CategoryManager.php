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
use Polls\Storage\AnswerMapperInterface;
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
     * Any compliant answer mapper
     * 
     * @var \Polls\Storage\AnswerMapperInterface
     */
    private $answerMapper;

    /**
     * State initialization
     * 
     * @param \Polls\Storage\CategoryMapperInterface $categoryMapper
     * @param \Polls\Storage\AnswerMapperInterface $answerMapper
     * @return void
     */
    public function __construct(CategoryMapperInterface $categoryMapper, AnswerMapperInterface $answerMapper)
    {
        $this->categoryMapper = $categoryMapper;
        $this->answerMapper = $answerMapper;
    }

    /**
     * {@inheritDoc}
     */
    protected function toEntity(array $category)
    {
        $entity = new VirtualEntity();
        $entity->setId($category['id'], VirtualEntity::FILTER_INT)
               ->setName($category['name'], VirtualEntity::FILTER_HTML)
               ->setClass($category['class'], VirtualEntity::FILTER_HTML)
               ->setOptionsCount($this->answerMapper->countByCategoryId($category['id']), VirtualEntity::FILTER_INT);

        return $entity;
    }

    /**
     * Returns category name by its associated id
     * 
     * @param string $id Category id
     * @return string
     */
    public function fetchNameById($id)
    {
        return $this->categoryMapper->fetchNameById($id);
    }

    /**
     * Fetches category's entity by its associated id
     * 
     * @param string $id
     * @return \Krystal\Stdlib\VirtualEntity
     */
    public function fetchById($id)
    {
        return $this->prepareResult($this->categoryMapper->fetchById($id));
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
     * Fetch categories as a list
     * 
     * @return array
     */
    public function fetchAsList()
    {
        $result = array();
        $entities = $this->fetchAll();

        foreach ($entities as $category) {
            $result[$category->getId()] = $category->getName();
        }

        return $result;
    }

    /**
     * Deletes a category by its associated id
     * 
     * @param string $id
     * @return boolean
     */
    public function deleteById($id)
    {
        return $this->answerMapper->deleteAllByCategoryId($id) && $this->categoryMapper->deleteById($id);
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

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
use Polls\Storage\AnswerMapperInterface;
use Krystal\Stdlib\VirtualEntity;

final class AnswerManager extends AbstractManager implements AnswerManagerInterface
{
    /**
     * Any compliant Answer's mapper
     * 
     * @var \Polls\Storage\AnswerMapperInterface
     */
    private $answerMapper;

    /**
     * State initialization
     * 
     * @param \Polls\Storage\AnswerMapperInterface $answerMapper
     * @return void
     */
    public function __construct(AnswerMapperInterface $answerMapper)
    {
        $this->answerMapper = $answerMapper;
    }

    /**
     * Update orders by their associated ids
     * 
     * @param array $pair
     * @return boolean
     */
    public function updateOrders(array $pair)
    {
        foreach ($pair as $id => $order) {
            if (!$this->answerMapper->updateOrder($id, $order)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Update published states by their associated ids
     * 
     * @param array $pair
     * @return boolean
     */
    public function updatePublishedStates(array $pair)
    {
        foreach ($pair as $id => $state) {
            if (!$this->answerMapper->updatePublished($id, $state)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Fetches all answers by associated category id
     * 
     * @param string $categoryId
     * @param boolean $published Whether to filter by published only
     * @return array
     */
    public function fetchAllByCategoryId($categoryId, $published)
    {
        return $this->prepareResults($this->answerMapper->fetchAllByCategoryId($categoryId, $published));
    }

    /**
     * {@inheritDoc}
     */
    protected function toEntity(array $answer)
    {
        $entity = new VirtualEntity();
        $entity->setId($answer['id'], VirtualEntity::FILTER_INT)
               ->setPublished($answer['published'], VirtualEntity::FILTER_BOOL)
               ->setTitle($answer['title'], VirtualEntity::FILTER_TAGS)
               ->setCategoryId($answer['category_id'], VirtualEntity::FILTER_INT)
               ->setOrder($answer['order'], VirtualEntity::FILTER_INT);

        return $entity;
    }

    /**
     * Returns last inserted id
     * 
     * @return integer
     */
    public function getLastId()
    {
        return $this->answerMapper->getLastId();
    }

    /**
     * Returns paginator instance
     * 
     * @return \Krystal\Paginate\Paginator
     */ 
    public function getPaginator()
    {
        return $this->answerMapper->getPaginator();
    }

    /**
     * Adds an answer
     * 
     * @param array $input Raw input data
     * @return boolean
     */
    public function add(array $input)
    {
        return $this->answerMapper->insert($input);
    }

    /**
     * Update an answer
     * 
     * @param array $input Raw input data
     * @return boolean
     */
    public function update(array $input)
    {
        return $this->answerMapper->update($input);
    }

    /**
     * Fetches answer's entity by its associated id
     * 
     * @param string $id
     * @return array
     */
    public function fetchById($id)
    {
        return $this->prepareResult($this->answerMapper->fetchById($id));
    }

    /**
     * Deletes an answer by its associated id
     * 
     * @param string $id
     * @return boolean
     */
    public function deleteById($id)
    {
        return $this->answerMapper->deleteById($id);
    }

    /**
     * Deletes a collection of answers by their associated ids
     * 
     * @param array $ids
     * @return boolean
     */
    public function deleteByIds(array $ids)
    {
        foreach ($ids as $id) {
            if (!$this->answerMapper->deleteById($id)){
                return false;
            }
        }

        return true;
    }
}

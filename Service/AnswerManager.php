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

final class AnswerManager extends AbstractManager
{
    /**
     * Answer mapper
     * 
     * @var object
     */
    private $answerMapper;

    /**
     * State initialization
     * 
     * @param AnswerMapperInterface $answerMapper
     * @return void
     */
    public function __construct(AnswerMapperInterface $answerMapper)
    {
        $this->answerMapper = $answerMapper;
    }

    /**
     * Fetch all by page
     * 
     * @param integer $page
     * @param integer $itemsPerPage
     * @return array
     */
    public function fetchAllByPage($page, $itemsPerPage)
    {
        return $this->prepareResults($this->answerMapper->fetchAllByPage($page, $itemsPerPage));
    }

    /**
     * {@inheritDoc}
     */
    protected function toEntity(array $answer)
    {
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
     * @return object
     */ 
    public function getPaginator()
    {
        return $this->answerMapper->getPaginator();
    }

    /**
     * Adds a record
     * 
     * @param stdclass $container
     * @return boolean
     */
    public function add(stdclass $container)
    {
        return $this->answerMapper->insert($container);
    }

    /**
     * Update a record
     * 
     * @param stdclass $container
     * @return boolean
     */
    public function update(stdclass $container)
    {
        return $this->answerMapper->update($container);
    }

    /**
     * Fetches a record by its associated id
     * 
     * @param string $id
     * @return array
     */
    public function fetchById($id)
    {
        return $this->prepareResult($this->answerMapper->fetchById($id));
    }

    /**
     * Deletes a record by its associated id
     * 
     * @param string $id
     * @return boolean
     */
    public function deleteById($id)
    {
        return $this->answerMapper->deleteById($id);
    }
}

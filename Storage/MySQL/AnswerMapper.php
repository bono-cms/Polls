<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Polls\Storage\MySQL;

use Cms\Storage\MySQL\AbstractMapper;
use Polls\Storage\AnswerMapperInterface;

final class AnswerMapper extends AbstractMapper implements AnswerMapperInterface
{
    /**
     * Fetch all by page
     * 
     * @param integer $page
     * @param integer $itemsPerPage
     * @return array
     */
    public function fetchAllByPage($page, $itemsPerPage)
    {
    }

    /**
     * Fetch all published answers
     * 
     * @param string $categoryId
     * @return array
     */
    public function fetchAllPublishedByCategoryId($categoryId)
    {
    }

    /**
     * Fetch all published record associated with category id
     * 
     * @param string $categoryId
     * @param integer $page
     * @param integer $itemsPerPage
     * @return array
     */
    public function fetchAllPublishedByCategoryIdAndPage($categoryId, $page, $itemsPerPage)
    {
    }

    /**
     * Fetch all records associated with given category id
     * 
     * @param string $categoryId
     * @param integer $page
     * @param integer $itemsPerPage
     * @return array
     */
    public function fetchAllByCategoryIdAndPage($categoryId, $page, $itemsPerPage)
    {
    }

    /**
     * Adds new answer
     * 
     * @param array $data
     * @return boolean
     */
    public function insert(array $data)
    {
        return $this->persist($data);
    }

    /**
     * Updates an answer`
     * 
     * @param array $data
     * @return boolean
     */
    public function update(array $data)
    {
        return $this->persist($data);
    }

    /**
     * Fetches a record by its associated id
     * 
     * @param string $id
     * @return array
     */
    public function fetchById($id)
    {
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
}

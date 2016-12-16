<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Polls\Storage;

interface AnswerMapperInterface
{
    /**
     * Increments vote count by answer id
     * 
     * @param string $id Answer id
     * @return boolean
     */
    public function incrementVoteCount($id);

    /**
     * Gets amount of voting options by associated category id
     * 
     * @param string $categoryId
     * @return integer
     */
    public function countByCategoryId($categoryId);

    /**
     * Updates sorting order
     * 
     * @param string $id
     * @param string $order
     * @return boolean
     */
    public function updateOrder($id, $order);

    /**
     * Updates published state
     * 
     * @param string $id
     * @param string $state
     * @return boolean
     */
    public function updatePublished($id, $state);

    /**
     * Fetches all answers by associated category id
     * 
     * @param string $categoryId
     * @param boolean $published Whether to filter by published only
     * @return array
     */
    public function fetchAllByCategoryId($categoryId, $published);

    /**
     * Adds new answer
     * 
     * @param array $data
     * @return boolean
     */
    public function insert(array $data);

    /**
     * Updates an answer
     * 
     * @param array $data
     * @return boolean
     */
    public function update(array $data);

    /**
     * Fetches answer's data by its associated id
     * 
     * @param string $id
     * @return array
     */
    public function fetchById($id);

    /**
     * Deletes all answers associated with particular category id
     * 
     * @param string $id Category id
     * @return boolean
     */
    public function deleteAllByCategoryId($id);

    /**
     * Deletes an answer by its associated id
     * 
     * @param string $id
     * @return boolean
     */
    public function deleteById($id);
}

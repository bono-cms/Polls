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

interface WebPageAnswerServiceInterface
{
    /**
     * Fetches the result-set by web page id
     * 
     * @param int $webPageId
     * @return array
     */
    public function fetchResultSet($webPageId);

    /**
     * Tracks a vote
     * 
     * @param int $webPageId Web Page ID
     * @param int $answerId Answer id
     * @param string $ip User IP
     * @return boolean Depending on success
     */
    public function vote($webPageId, $answerId, $ip);

    /**
     * Adds an answer
     * 
     * @param array $input Raw input data
     * @return boolean
     */
    public function add(array $input);

    /**
     * Update an answer
     * 
     * @param array $input Raw input data
     * @return boolean
     */
    public function update(array $input);

    /**
     * Removes an answer by its ID
     * 
     * @param int $id Answer ID
     * @return boolean
     */
    public function deleteById($id);
    
    /**
     * Returns last answer ID
     * 
     * @return int
     */
    public function getLastId();

    /**
     * Fetches answer entity by its associated ID
     * 
     * @param int $id Answer ID
     * @return \Krystal\Stdlib\VirtualEntity|boolean
     */
    public function fetchById($id);

    /**
     * Find all answers by attached web page ID
     * 
     * @param int $webPageId
     * @return array
     */
    public function findAllByWebPageId($webPageId);
}

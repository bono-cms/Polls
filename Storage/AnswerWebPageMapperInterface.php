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

interface AnswerWebPageMapperInterface
{
    /**
     * Find all answers by attached web page ID
     * 
     * @param int $webPageId
     * @return array
     */
    public function findAllByWebPageId($webPageId);

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
}

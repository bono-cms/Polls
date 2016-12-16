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

interface VotesMapperInterface
{
    /**
     * Tracks a category ID and user's IP
     * 
     * @param string $categoryId
     * @param string $ip
     * @return boolean
     */
    public function track($categoryId, $ip);

    /**
     * Checks whether category and IP has been already registered
     * 
     * @param string $categoryId
     * @param string $ip
     * @return boolean
     */
    public function hasVoted($categoryId, $ip);
}

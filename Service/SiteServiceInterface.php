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

interface SiteServiceInterface
{
    /**
     * Return answer entities by random category id
     * 
     * @return array
     */
    public function getAnswersByRandomActiveCategory();

    /**
     * Returns all answer entities associated with particular category id
     * 
     * @param string $id Category id
     * @return array
     */
    public function getAnswersByCategoryId($id);
}

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

interface WebPageSettingsMapperInterface
{
    /**
     * Persists a record
     * 
     * @param array $input
     * @return boolean
     */
    public function save(array $input);

    /**
     * Finds by web column id
     * 
     * @param int $webPageId
     * @return string
     */
    public function findNameByWebPageId($webPageId);

    /**
     * Finds by web column id
     * 
     * @param int $webPageId
     * @return array
     */
    public function findByWebPageId($webPageId);
}

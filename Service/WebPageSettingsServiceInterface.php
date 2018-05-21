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

interface WebPageSettingsServiceInterface
{
    /**
     * Save web page settings
     * 
     * @param array $input
     * @return boolean
     */
    public function save(array $input);

    /**
     * Find entity by attached web page ID
     * 
     * @param mixed $webPageId
     * @return array|\Krystal\Stdlib\VirtualEntity
     */
    public function findByWebPageId($webPageId);
}

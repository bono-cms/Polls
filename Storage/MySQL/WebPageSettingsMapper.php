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

final class WebPageSettingsMapper extends AbstractMapper
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return self::getWithPrefix('bono_module_polls_web_page_settings');
    }

    /**
     * Checks whether entry for web page ID already exists
     * 
     * @param int $webPageId
     * @return boolean
     */
    public function hasEntry($webPageId)
    {
        $result = $this->db->select()
                           ->count('id')
                           ->from(self::getTableName())
                           ->whereEquals('web_page_id', $webPageId)
                           ->queryScalar();

        return $result > 0;
    }
}

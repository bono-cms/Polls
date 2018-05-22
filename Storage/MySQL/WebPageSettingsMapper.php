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
use Polls\Storage\WebPageSettingsMapperInterface;

final class WebPageSettingsMapper extends AbstractMapper implements WebPageSettingsMapperInterface
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return self::getWithPrefix('bono_module_polls_web_page_settings');
    }

    /**
     * Persists a record
     * 
     * @param array $input
     * @return boolean
     */
    public function save(array $input)
    {
        return $this->persist($this->getWithLang($input));
    }

    /**
     * Finds by web column id
     * 
     * @param int $webPageId
     * @return string
     */
    public function findNameByWebPageId($webPageId)
    {
        return $this->fetchOneColumn('name', 'web_page_id', $webPageId);
    }

    /**
     * Finds by web column id
     * 
     * @param int $webPageId
     * @return array
     */
    public function findByWebPageId($webPageId)
    {
        return $this->fetchByColumn('web_page_id', $webPageId);
    }
}

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

use Polls\Storage\AnswerWebPageMapperInterface;
use Cms\Storage\MySQL\AbstractMapper;

final class AnswerWebPageMapper extends AbstractMapper implements AnswerWebPageMapperInterface
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return self::getWithPrefix('bono_module_polls_web_page_answers');
    }

    /**
     * Find all answers by attached web page ID
     * 
     * @param int $webPageId
     * @return array
     */
    public function findAllByWebPageId($webPageId)
    {
        return $this->db->select('*')
                        ->from(self::getTableName())
                        ->whereEquals('web_page_id', $webPageId)
                        ->queryAll();
    }
}

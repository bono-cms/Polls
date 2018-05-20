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
     * Increments vote count by answer id
     * 
     * @param string $id Answer id
     * @return boolean
     */
    public function incrementVoteCount($id)
    {
        return $this->incrementColumnByPk($id, 'votes');
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

    /**
     * Adds new answer
     * 
     * @param array $data
     * @return boolean
     */
    public function insert(array $data)
    {
        return $this->persist($this->getWithLang($data));
    }

    /**
     * Updates an answer
     * 
     * @param array $data
     * @return boolean
     */
    public function update(array $data)
    {
        return $this->persist($data);
    }
}

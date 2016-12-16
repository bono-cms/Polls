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
use Polls\Storage\VotesMapperInterface;

final class VotesMapper extends AbstractMapper implements VotesMapperInterface
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return self::getWithPrefix('bono_module_polls_votes');
    }

    /**
     * Tracks a category ID and user's IP
     * 
     * @param string $categoryId
     * @param string $ip
     * @return boolean
     */
    public function track($categoryId, $ip)
    {
        return $this->persist(array(
            'category_id' => $categoryId, 
            'user_ip' => $ip
        ));
    }

    /**
     * Checks whether category and IP has been already registered
     * 
     * @param string $categoryId
     * @param string $ip
     * @return boolean
     */
    public function hasVoted($categoryId, $ip)
    {
        $alias = 'count';
        $result = $this->db->select()
                           ->count('user_ip', $alias)
                           ->from(self::getTableName())
                           ->whereEquals('category_id', $categoryId)
                           ->andWhereEquals('user_ip', $ip)
                           ->query($alias);

        return $result > 0;
    }
}

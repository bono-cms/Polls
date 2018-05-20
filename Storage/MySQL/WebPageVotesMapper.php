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

final class WebPageVotesMapper extends AbstractMapper implements VotesMapperInterface
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return self::getWithPrefix('bono_module_polls_web_page_votes');
    }

    /**
     * Tracks a web page ID and user's IP
     * 
     * @param string $webPageId
     * @param string $ip
     * @return boolean
     */
    public function track($webPageId, $ip)
    {
        return $this->persist(array(
            'web_page_id' => $webPageId, 
            'user_ip' => $ip
        ));
    }

    /**
     * Checks whether web page ID and IP has been already registered
     * 
     * @param string $webPageId
     * @param string $ip
     * @return boolean
     */
    public function hasVoted($webPageId, $ip)
    {
        $result = $this->db->select()
                           ->count('user_ip')
                           ->from(self::getTableName())
                           ->whereEquals('web_page_id', $webPageId)
                           ->andWhereEquals('user_ip', $ip)
                           ->queryScalar();

        return $result > 0;
    }
}

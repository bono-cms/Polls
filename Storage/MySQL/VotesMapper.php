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

final class VotesMapper extends AbstractMapper
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return self::getWithPrefix('bono_module_polls_votes');
    }

    /**
     * {@inheritDoc}
     */
    protected function getPk()
    {
        return 'answer_id';
    }

    /**
     * Increments a vote
     * 
     * @param string $id Answer's id
     * @return boolean
     */
    public function incrementVote($id)
    {
        return $this->incrementColumnByPk($id, 'answer_id');
    }

    /**
     * Inserts a record
     * 
     * @param string $id Answer id
     * @param string $ip User's IP
     * @return boolean
     */
    public function insert($id, $ip)
    {
        return $this->persist(array(
            'answer_id' => $id,
            'user_ip' => $ip,
            'count' => 0
        ));
    }
}

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
use Polls\Storage\AnswerMapperInterface;

final class AnswerMapper extends AbstractMapper implements AnswerMapperInterface
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return self::getWithPrefix('bono_module_polls_answers');
    }

    /**
     * Resets vote count by associated category id
     * 
     * @param string $categoryId
     * @return boolean
     */
    public function resetVoteCountByCategoryId($categoryId)
    {
        return $this->db->update(self::getTableName(), array('votes' => '0'))
                        ->whereEquals('category_id', $categoryId)
                        ->execute();
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
     * Gets amount of voting options by associated category id
     * 
     * @param string $categoryId
     * @return integer
     */
    public function countByCategoryId($categoryId)
    {
        return $this->countByColumn('category_id', $categoryId);
    }

    /**
     * Updates sorting order
     * 
     * @param string $id
     * @param string $order
     * @return boolean
     */
    public function updateOrder($id, $order)
    {
        return $this->updateColumnByPk($id, 'order', $order);
    }

    /**
     * Updates published state
     * 
     * @param string $id
     * @param string $state
     * @return boolean
     */
    public function updatePublished($id, $state)
    {
        return $this->updateColumnByPk($id, 'published', $state);
    }

    /**
     * Fetches all answers by associated category id
     * 
     * @param string $categoryId
     * @param boolean $published Whether to filter by published only
     * @return array
     */
    public function fetchAllByCategoryId($categoryId, $published)
    {
        $db = $this->db->select('*')
                       ->from(self::getTableName())
                       ->whereEquals('category_id', $categoryId);

        if ($published === true) {
            $db->andWhereEquals('published', '1');
        }

        return $db->orderBy('id')
                  ->desc()
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

    /**
     * Fetches answer's data by its associated id
     * 
     * @param string $id
     * @return array
     */
    public function fetchById($id)
    {
        return $this->findByPk($id);
    }

    /**
     * Deletes all answers associated with particular category id
     * 
     * @param string $id Category id
     * @return boolean
     */
    public function deleteAllByCategoryId($id)
    {
        return $this->deleteByColumn('category_id', $id);
    }

    /**
     * Deletes an answer by its associated id
     * 
     * @param string $id
     * @return boolean
     */
    public function deleteById($id)
    {
        return $this->deleteByPk($id);
    }
}

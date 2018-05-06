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

use Polls\Storage\AnswerWebPageMapperInterface;
use Cms\Service\AbstractManager;
use Krystal\Stdlib\VirtualEntity;

final class WebPageAnswerService extends AbstractManager
{
    /**
     * Any compliant web page mapper
     * 
     * @var \Polls\Storage\AnswerWebPageMapperInterface
     */
    private $answerWebPageMapper;

    /**
     * State initialization
     * 
     * @param $answerWebPageMapper \Polls\Storage\AnswerWebPageMapperInterface
     * @return void
     */
    public function __construct(AnswerWebPageMapperInterface $answerWebPageMapper)
    {
        $this->answerWebPageMapper = $answerWebPageMapper;
    }

    /**
     * {@inheritDoc}
     */
    protected function toEntity(array $answer)
    {
        $entity = new VirtualEntity(false);
        $entity->setId($answer['id'], VirtualEntity::FILTER_INT)
               ->setPublished($answer['published'], VirtualEntity::FILTER_BOOL)
               ->setTitle($answer['title'], VirtualEntity::FILTER_HTML)
               ->setWebPageId($answer['web_page_id'], VirtualEntity::FILTER_INT)
               ->setOrder($answer['order'], VirtualEntity::FILTER_INT)
               ->setVotes($answer['votes'], VirtualEntity::FILTER_INT);

        return $entity;
    }

    /**
     * Adds an answer
     * 
     * @param array $input Raw input data
     * @return boolean
     */
    public function add(array $input)
    {
        // Defaults
        $input['order'] = (int) $input['order'];
        $input['votes'] = 0;

        return $this->answerWebPageMapper->insert($input);
    }

    /**
     * Update an answer
     * 
     * @param array $input Raw input data
     * @return boolean
     */
    public function update(array $input)
    {
        $input['order'] = (int) $input['order'];
        return $this->answerWebPageMapper->update($input);
    }

    /**
     * Returns last answer ID
     * 
     * @return int
     */
    public function getLastId()
    {
        return $this->answerWebPageMapper->getMaxId();
    }

    /**
     * Fetches answer entity by its associated ID
     * 
     * @param int $id Answer ID
     * @return \Krystal\Stdlib\VirtualEntity|boolean
     */
    public function fetchById($id)
    {
        return $this->prepareResult($this->answerWebPageMapper->findByPk($id));
    }

    /**
     * Find all answers by attached web page ID
     * 
     * @param int $webPageId
     * @return array
     */
    public function findAllByWebPageId($webPageId)
    {
        return $this->prepareResults($this->answerWebPageMapper->findAllByWebPageId($webPageId));
    }
}

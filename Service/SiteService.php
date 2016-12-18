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

use Krystal\Stdlib\VirtualEntity;
use Polls\Storage\CategoryMapperInterface;

final class SiteService implements SiteServiceInterface
{
    /**
     * Answer service
     * 
     * @var \Polls\Service\AnswerManagerInterface
     */
    private $answerManager;

    /**
     * Any compliant category mapper
     * 
     * @var \Polls\Storage\CategoryMapperInterface
     */
    private $categoryMapper;

    /**
     * State initialization
     * 
     * @param \Polls\Service\AnswerManagerInterface $answerManager
     * @param \Polls\Storage\CategoryMapperInterface $categoryMapper
     * @return void
     */
    public function __construct(AnswerManagerInterface $answerManager, CategoryMapperInterface $categoryMapper)
    {
        $this->answerManager = $answerManager;
        $this->categoryMapper = $categoryMapper;
    }

    /**
     * Return answer entities by random category id
     * 
     * @return array
     */
    public function getAnswersByRandomActiveCategory()
    {
        $id = $this->categoryMapper->fetchRandomActiveId();
        return $this->getAnswersByCategoryId($id);
    }

    /**
     * Returns all answer entities associated with particular category id
     * 
     * @param string $id Category id
     * @return array
     */
    public function getAnswersByCategoryId($id)
    {
        $entity = new VirtualEntity();
        $entity->setName($this->categoryMapper->fetchNameById($id), VirtualEntity::FILTER_TAGS)
               ->setCategoryId($id, VirtualEntity::FILTER_INT)
               ->setAnswers($this->answerManager->fetchAllByCategoryId($id, true));

        return $entity;
    }
}

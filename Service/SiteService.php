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
use Polls\Storage\WebPageSettingsMapperInterface;

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
     * Web page answer service
     * 
     * @var \Site\Service\WebPageAnswerService
     */
    private $webPageAnswerService;

    /**
     * Web page settings mapper
     * 
     * @var \Polls\Storage\WebPageSettingsMapperInterface
     */
    private $webPageSettingsMapper;

    /**
     * State initialization
     * 
     * @param \Polls\Service\AnswerManagerInterface $answerManager
     * @param \Polls\Storage\CategoryMapperInterface $categoryMapper
     * @param \Site\Service\WebPageAnswerService $webPageAnswerService
     * @param \Polls\Storage\WebPageSettingsMapperInterface $webPageSettingsMapper
     * @return void
     */
    public function __construct(
        AnswerManagerInterface $answerManager, 
        CategoryMapperInterface $categoryMapper, 
        WebPageAnswerService $webPageAnswerService, 
        WebPageSettingsMapperInterface $webPageSettingsMapper
    ){
        $this->answerManager = $answerManager;
        $this->categoryMapper = $categoryMapper;
        $this->webPageAnswerService = $webPageAnswerService;
        $this->webPageSettingsMapper = $webPageSettingsMapper;
    }

    /**
     * Returns all answers associated with web page ID
     * 
     * @param int $webPageId
     * @return array
     */
    public function getAllByWebPageId($webPageId)
    {
        $name = $this->webPageSettingsMapper->findNameByWebPageId($webPageId);
        $answers = $this->webPageAnswerService->findAllByWebPageId($webPageId);

        if (!empty($name) && !empty($answers)) {
            $entity = new VirtualEntity();
            $entity->setName($name, VirtualEntity::FILTER_TAGS)
                   ->setWebPageId($webPageId, VirtualEntity::FILTER_INT)
                   ->setAnswers($answers);

            return $entity;
        } else {
            return false;
        }
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
        $name = $this->categoryMapper->fetchNameById($id);
        $answers = $this->answerManager->fetchAllByCategoryId($id, true);

        if (!empty($name) && !empty($answers)) {
            $entity = new VirtualEntity();
            $entity->setName($name, VirtualEntity::FILTER_TAGS)
                   ->setCategoryId($id, VirtualEntity::FILTER_INT)
                   ->setAnswers($answers);

            return $entity;
        } else {
            return false;
        }
    }
}

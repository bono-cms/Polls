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

final class SiteService implements SiteServiceInterface
{
    /**
     * Answer service
     * 
     * @var \Polls\Service\AnswerManagerInterface
     */
    private $answerManager;

    /**
     * State initialization
     * 
     * @param \Polls\Service\AnswerManagerInterface $answerManager
     * @return void
     */
    public function __construct(AnswerManagerInterface $answerManager)
    {
        $this->answerManager = $answerManager;
    }

    /**
     * Returns all answer entities associated with particular category id
     * 
     * @param string $id Category id
     * @return array
     */
    public function getAnswersByCategoryId($id)
    {
        return $this->answerManager->fetchAllByCategoryId($id, true);
    }
}

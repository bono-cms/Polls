<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Polls\Controller;

use Site\Controller\AbstractController;

final class WebPage extends AbstractController
{
    /**
     * Votes for an answer
     * 
     * @return string
     */
    public function voteAction()
    {
        if ($this->request->hasPost('answer_id', 'web_page_id')) {
            // Request vars
            $webPageId = $this->request->getPost('web_page_id');
            $answerId = $this->request->getPost('answer_id');

            $webPageAnswerService = $this->getModuleService('webPageAnswerService');
            $webPageAnswerService->vote($webPageId, $answerId, $this->request->getClientIP());

            return $this->resultsAction($webPageId);
        }
    }

    /**
     * View results
     * 
     * @param int $webPageId
     * @return string
     */
    public function resultsAction($webPageId)
    {
    }
}

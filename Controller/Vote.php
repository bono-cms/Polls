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

final class Vote extends AbstractController
{
    /**
     * Votes for an answer
     * 
     * @return string
     */
    public function voteAction()
    {
        if ($this->request->hasPost('answer_id', 'category_id')) {
            // Request vars
            $categoryId = $this->request->getPost('category_id');
            $answerId = $this->request->getPost('answer_id');

            $answerManager = $this->getModuleService('answerManager');
            $answerManager->vote($categoryId, $answerId, $this->request->getClientIP());

            return $this->resultsAction($categoryId);
        }
    }

    /**
     * View results
     * 
     * @param string $categoryId
     * @return string
     */
    public function resultsAction($categoryId)
    {
        // Configure view
        $this->view->setModule('Polls')
                   ->setTheme('partials')
                   ->disableLayout();

        $result = $this->getModuleService('answerManager')->fetchResultSet($categoryId);

        return $this->view->render('poll-results', array(
            'answers' => $result['answers'],
            'total' => $result['total'],
            'category' => $this->getModuleService('categoryManager')->fetchNameById($categoryId)
        ));
    }
}

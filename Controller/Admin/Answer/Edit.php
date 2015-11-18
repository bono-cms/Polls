<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Polls\Controller\Admin\Answer;

final class Edit extends AbstractAnswer
{
    /**
     * Shows edit form
     * 
     * @param string $id
     * @return string
     */
    public function indexAction($id)
    {
        $answer = $this->getModuleService('answerManager')->fetchById($id);

        if ($answer !== false) {
            $this->loadBreadcrumbs('Edit the answer');

            return $this->view->render('answer.form', array(
                'title' => 'Edit the answer',
                'answer' => $answer,
                'categories' => $this->getModuleService('categoryManager')->fetchAsList()
            ));

        } else {
            return false;
        }
    }

    /**
     * Updates an answer
     * 
     * @return string
     */
    public function updateAction()
    {
        $formValidator = $this->getValidator($this->request->getPost('answer'));

        if ($formValidator->isValid()) {
            $answerManager = $this->getModuleService('answerManager');
            $answerManager->update($this->request->getPost('answer'));

            $this->flashBag->set('success', 'An answer has been added successfully');
            return '1';

        } else {
            return $formValidator->getErrors();
        }
    }
}

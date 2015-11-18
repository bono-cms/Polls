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

use Krystal\Stdlib\VirtualEntity;

final class Add extends AbstractAnswer
{
    /**
     * Displays adding form
     * 
     * @return string
     */
    public function indexAction()
    {
        $this->loadBreadcrumbs('Add new option');

        $answer = new VirtualEntity();
        $answer->setPublished(true);

        return $this->view->render('answer.form', array(
            'title' => 'Add new option',
            'answer' => $answer,
            'categories' => $this->getModuleService('categoryManager')->fetchAsList()
        ));
    }

    /**
     * Adds an answer
     * 
     * @return string
     */
    public function addAction()
    {
        $formValidator = $this->getValidator($this->request->getPost('answer'));

        if ($formValidator->isValid()) {
            $answerManager = $this->getModuleService('answerManager');
            $answerManager->add($this->request->getPost('answer'));

            $this->flashBag->set('success', 'An answer has been added successfully');
            return $answerManager->getLastId();

        } else {
            return $formValidator->getErrors();
        }
    }
}

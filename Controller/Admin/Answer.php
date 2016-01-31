<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Polls\Controller\Admin;

use Cms\Controller\Admin\AbstractController;
use Krystal\Validate\Pattern;
use Krystal\Stdlib\VirtualEntity;

final class Answer extends AbstractController
{
    /**
     * Creates a form
     * 
     * @param \Krystal\Stdlib\VirtualEntity $answer
     * @return string
     */
    private function createForm(VirtualEntity $answer, $title)
    {
        // Append breadcrumbs
        $this->view->getBreadcrumbBag()->addOne('Polls', 'Polls:Admin:Browser@indexAction')
                                       ->addOne($title);

        return $this->view->render('answer.form', array(
            'answer' => $answer,
            'categories' => $this->getModuleService('categoryManager')->fetchAsList()
        ));
    }

    /**
     * Renders empty form
     * 
     * @return string
     */
    public function addAction()
    {
        $answer = new VirtualEntity();
        $answer->setPublished(true);

        return $this->createForm($answer, 'Add new answer');
    }

    /**
     * Renders edit form
     * 
     * @param string $id
     * @return string
     */
    public function editAction($id)
    {
        $answer = $this->getModuleService('answerManager')->fetchById($id);

        if ($answer !== false) {
            return $this->createForm($answer, 'Edit the answer');
        } else {
            return false;
        }
    }

    /**
     * Deletes an answer by its associated id
     * 
     * @return string
     */
    public function deleteAction()
    {
        if ($this->request->hasPost('toDelete')) {
            $ids = array_keys($this->request->getPost('toDelete'));

            $answerManager = $this->getModuleService('answerManager');
            $answerManager->deleteByIds($ids);

            $this->flashBag->set('success', 'Selected answers have been removed successfully');
        }

        if ($this->request->hasPost('id') && $this->request->isAjax()) {
            $id = $this->request->getPost('id');

            $answerManager = $this->getModuleService('answerManager');
            $answerManager->deleteById($id);

            $this->flashBag->set('success', 'An answer has been removed successfully');
        }

        return '1';
    }

    /**
     * Saves the form
     * 
     * @return string
     */
    public function tweakAction()
    {
        if ($this->request->hasPost('published', 'order') && $this->request->isAjax()) {
            $published = $this->request->getPost('published');
            $orders = $this->request->getPost('order');

            // Do update
            $answerManager = $this->getModuleService('answerManager');
            $answerManager->updatePublishedStates($published);
            $answerManager->updateOrders($orders);

            $this->flashBag->set('success', 'Settings have been updated successfully');
            return '1';
        }
    }

    /**
     * Persists an answer
     * 
     * @return string
     */
    public function saveAction()
    {
        $input = $this->request->getPost('answer');

        $formValidator = $this->validatorFactory->build(array(
            'input' => array(
                'source' => $input,
                'definition' => array(
                    'title' => new Pattern\Title()
                )
            )
        ));

        if ($formValidator->isValid()) {
            $answerManager = $this->getModuleService('answerManager');

            if ($input['id']) {
                $answerManager->update($input);
                $this->flashBag->set('success', 'An answer has been added successfully');
                return '1';

            } else {
                $answerManager->add($input);
                $this->flashBag->set('success', 'An answer has been added successfully');
                return $answerManager->getLastId();
            }

        } else {
            return $formValidator->getErrors();
        }
    }
}

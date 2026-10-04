<?php

/**
 * This file is part of the Bono CMS
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Polls\Controller\Admin;

use Cms\Controller\Admin\AbstractController;
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

        return $this->view->render('answer.form', [
            'answer' => $answer,
            'categories' => $this->getModuleService('categoryManager')->fetchAsList()
        ]);
    }

    /**
     * Renders empty form
     * 
     * @param string $categoryId Category id
     * @return string
     */
    public function addAction($categoryId)
    {
        $answer = new VirtualEntity();
        $answer->setPublished(true)
               ->setCategoryId($categoryId);

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
            return $this->createForm($answer, $this->translator->translate('Edit the answer "%s"', $answer->getTitle()));
        } else {
            return false;
        }
    }

    /**
     * Reset votes count associated with given category id
     * 
     * @param string $id Category id
     * @return string
     */
    public function resetVotesAction($id)
    {
        if ($this->getModuleService('answerManager')->resetVoteCountByCategoryId($id)) {
            $this->flashBag->set('success', 'Votes have been successfully reset');
        }

        return $this->json([
            'refresh' => true
        ]);
    }

    /**
     * Deletes an answer by its associated id
     * 
     * @param string $id
     * @return string
     */
    public function deleteAction($id)
    {
        $service = $this->getModuleService('answerManager');

        // Batch removal
        if ($this->request->hasPost('batch')) {
            $ids = array_keys($this->request->getPost('batch'));

            $service->deleteByIds($ids);
            $this->flashBag->set('success', 'Selected elements have been removed successfully');

        } else {
            $this->flashBag->set('warning', 'You should select at least one element to remove');
        }

        // Single removal
        if (!empty($id)) {
            $service->deleteById($id);
            $this->flashBag->set('success', 'Selected element has been removed successfully');
        }

        return $this->json([
            'refresh' => true
        ]);
    }

    /**
     * Saves the form
     * 
     * @return string
     */
    public function tweakAction()
    {
        if ($this->request->hasPost('published', 'order') && $this->request->isAjax()) {
            $validator = $this->createValidation();

            $validator->field('order.*')
                      ->addRule('numeric');

            if ($validator->isPassed()) {
                $published = $this->request->getPost('published');
                $orders = $this->request->getPost('order');

                // Do update
                $answerManager = $this->getModuleService('answerManager');
                $answerManager->updatePublishedStates($published);
                $answerManager->updateOrders($orders);

                $this->flashBag->set('success', 'Settings have been updated successfully');

                return $this->json([
                    'refresh' => true
                ]);
            } else {
                return $this->json([
                    'errors' => $validator->getErrors()
                ]);
            }
        }
    }

    /**
     * Persists an answer
     * 
     * @return string
     */
    public function saveAction()
    {
        $validator = $this->createValidation();

        $validator->field('answer.title')
                  ->required();

        $validator->field('answer.category_id')
                  ->required()
                  ->addRule('numeric');

        $validator->field('answer.order')
                  ->addRule('numeric');

        $input = $this->request->getPost('answer');

        if ($validator->isPassed()) {
            $service = $this->getModuleService('answerManager');

            // Update
            if (!empty($input['id'])) {
                if ($service->update($input)) {
                    $this->flashBag->set('success', 'The element has been updated successfully');

                    return $this->json([
                        'refresh' => true
                    ]);
                }

            } else {
                // Create
                if ($service->add($input)) {
                    $this->flashBag->set('success', 'The element has been created successfully');

                    return $this->json([
                        'redirect' => $this->createUrl('Polls:Admin:Answer@editAction', [$service->getLastId()]),
                    ]);
                }
            }

        } else {
            return $this->json([
                'errors' => $validator->getErrors()
            ]);
        }
    }
}

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

final class WebPage extends AbstractController
{
    /**
     * Creates grid
     * 
     * @param \Krystal\Stdlib\VirtualEntity $entity
     * @return string
     */
    private function createGrid(VirtualEntity $entity)
    {
        // Append a breadcrumb
        $this->view->getBreadcrumbBag()
                   ->addOne('Web page answers');

        return $this->view->render('web-page-grid', array(
            'answers' => $this->getModuleService('webPageAnswerService')->findAllByWebPageId($entity->getWebPageId()),
            'entity' => $entity
        ));
    }

    /**
     * Renders all attached answers
     * 
     * @param int $webPageId
     * @return string
     */
    public function indexAction($webPageId)
    {
        $entity = new VirtualEntity();
        $entity->setPublished(true)
               ->setWebPageId($webPageId);

        return $this->createGrid($entity);
    }

    /**
     * Renders edit form
     * 
     * @param int $id Answer ID
     * @return string
     */
    public function editAction($id)
    {
        $entity = $this->getModuleService('webPageAnswerService')->fetchById($id);

        if ($entity !== false) {
            return $this->createGrid($entity);
        } else {
            return false;
        }
    }

    /**
     * Deletes an answer
     * 
     * @param int $id Answer ID
     * @return string
     */
    public function deleteAction($id)
    {
        $service = $this->getModuleService('webPageAnswerService');
        $service->deleteById($id);

        $this->flashBag->set('success', 'Selected element has been removed successfully');
        return 1;
    }

    /**
     * Persist an answer
     * 
     * @return string
     */
    public function saveAction()
    {
        // Grab raw input data
        $input = $this->request->getPost('answer');

        $service = $this->getModuleService('webPageAnswerService');

        if ($input['id']) {
            $service->update($input);

            $this->flashBag->set('success', 'The element has been updated successfully');
            return 1;

        } else {
            $service->add($input);

            $this->flashBag->set('success', 'The element has been created successfully');
            return $service->getLastId();
        }
    }
}

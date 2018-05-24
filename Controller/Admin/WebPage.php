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
     * Update poll settings of web page
     * 
     * @param int $webPageId
     * @return int
     */
    public function settingsAction($webPageId)
    {
        $data = $this->request->getPost();
        $this->getModuleService('webPageSettingsService')->save($data);

        $this->flashBag->set('success', 'Poll settings have been updated successfully');
        return 1;
    }

    /**
     * Creates grid
     * 
     * @param \Krystal\Stdlib\VirtualEntity $entity
     * @return string
     */
    private function createGrid(VirtualEntity $entity)
    {
        // Target module we're in
        $module = $this->request->getQuery('module');
        $backUrl = $this->request->getQuery('back_url');
        $title = $this->request->getQuery('title');

        // Append a breadcrumb
        $this->view->getBreadcrumbBag()
                   ->addOne($module, $backUrl)
                   ->addOne('Web page poll');

        return $this->view->render('web-page-grid', array(
            'answers' => $this->getModuleService('webPageAnswerService')->findAllByWebPageId($entity->getWebPageId()),
            'entity' => $entity,
            'webPage' => $this->getModuleService('webPageSettingsService')->findByWebPageId($entity->getWebPageId()),
            'title' => $title,
            'module' => $module,
            'backUrl' => $backUrl
        ));
    }

    /**
     * Renders all attached answers
     * 
     * @return string
     */
    public function indexAction()
    {
        if ($this->request->hasQuery('web_page_id')) {
            // Request parameters
            $webPageId = $this->request->getQuery('web_page_id');

            $entity = new VirtualEntity();
            $entity->setPublished(true)
                   ->setWebPageId($webPageId);

            return $this->createGrid($entity);

        } else {
            return false;
        }
    }

    /**
     * Renders edit form
     * 
     * @return string
     */
    public function editAction()
    {
        if ($this->request->hasQuery('id')) {
            // Request parameters
            $id = $this->request->getQuery('id');

            $entity = $this->getModuleService('webPageAnswerService')->fetchById($id);

            if ($entity !== false) {
                return $this->createGrid($entity);
            } else {
                return false;
            }

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

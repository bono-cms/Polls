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

final class Browser extends AbstractController
{
    /**
     * Display grids
     * 
     * @param integer $page
     * @return string
     */
    public function indexAction($page = 1)
    {
        $this->loadPlugins();

        $categoryManager = $this->getModuleService('categoryManager');
        $answerManager = $this->getModuleService('answerManager');

        return $this->view->render('browser', array(
            'title' => 'Polls',
            'answers' => $answerManager->fetchAllByCategoryId($categoryManager->getLastId()),
            'categories' => $categoryManager->fetchAll()
        ));
    }

    /**
     * Saves the form
     * 
     * @return string
     */
    public function saveAction()
    {
        if ($this->request->hasPost('published') && $this->request->isAjax()) {
            
        }
    }

    /**
     * Delete selected items
     * 
     * @return string
     */
    public function deleteSelectedAction()
    {
    }

    /**
     * Deletes an item by its associated id
     * 
     * @return string
     */
    public function deleteAction()
    {
        if ($this->request->hasPost('id') && $this->request->isAjax()) {
            
        }
    }
    
    /**
     * Loads plugins for a view
     * 
     * @return void
     */
    private function loadPlugins()
    {
        $this->view->getBreadcrumbBag()->addOne('Polls');
    }
}

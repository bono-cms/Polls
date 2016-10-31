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
     * @param integer $categoryId Category id to be selected
     * @return string
     */
    public function indexAction($categoryId = null)
    {
        // Load view plugins
        $this->view->getBreadcrumbBag()
                   ->addOne('Polls');

        $categoryManager = $this->getModuleService('categoryManager');
        $answerManager = $this->getModuleService('answerManager');

        // If no explicit id specified, then use the latest
        if (is_null($categoryId)) {
            $categoryId = $categoryManager->getLastId();
        }

        return $this->view->render('browser', array(
            'answers' => $answerManager->fetchAllByCategoryId($categoryId, false),
            'categories' => $categoryManager->fetchAll(),
            'categoryId' => $categoryId
        ));
    }

    /**
     * Filters by category id
     * 
     * @param string $category id
     * @return string
     */
    public function categoryAction($categoryId)
    {
        return $this->indexAction($categoryId);
    }
}

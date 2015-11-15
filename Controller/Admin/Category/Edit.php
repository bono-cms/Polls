<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Polls\Controller\Admin\Category;

final class Edit extends AbstractCategory
{
    /**
     * Shows the edit form
     * 
     * @param string $id Category id
     * @return string
     */
    public function indexAction($id)
    {
        $category = $this->getModuleService('categoryManager')->fetchById($id);

        if ($category !== false) {
            $this->loadBreadcrumbs('Edit the category');

            return $this->view->render('category.form', array(
                'category' => $category,
                'title' => 'Edit the category'
            ));
        } else {
            return false;
        }
    }

    /**
     * Updates a category
     * 
     * @return string
     */
    public function updateAction()
    {
        $formValidator = $this->getValidator($this->request->getPost('category'));

        if ($formValidator->isValid()) {
            $categoryManager = $this->getModuleService('categoryManager');
            $categoryManager->update($this->request->getPost('category'));

            $this->flashBag->set('success', 'The category has been updated successfully');
            return '1';
        } else {
            return $formValidator->getErrors();
        }
    }
}

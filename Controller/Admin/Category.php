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

final class Category extends AbstractController
{
    /**
     * Creates a form
     * 
     * @param \Krystal\Stdlib\VirtualEntity $category
     * @param string $title
     * @return string
     */
    private function createForm(VirtualEntity $category, $title)
    {
        // Append breadcrumbs
        $this->view->getBreadcrumbBag()->addOne('Polls', 'Polls:Admin:Browser@indexAction')
                                       ->addOne($title);

        return $this->view->render('category.form', [
            'category' => $category
        ]);
    }

    /**
     * Renders empty form
     * 
     * @return string
     */
    public function addAction()
    {
        $category = new VirtualEntity();
        $category->setActive(true);

        return $this->createForm($category, 'Add a category');
    }

    /**
     * Renders edit form
     * 
     * @param string $id
     * @return string
     */
    public function editAction($id)
    {
        $category = $this->getModuleService('categoryManager')->fetchById($id);

        if ($category !== false) {
            return $this->createForm($category, $this->translator->translate('Edit the category "%s"', $category->getName()));
        } else {
            return false;
        }
    }

    /**
     * Deletes a category by its associated id
     * 
     * @param string $id
     * @return string
     */
    public function deleteAction($id)
    {
        $service = $this->getModuleService('categoryManager');
        $service->deleteById($id);

        $this->flashBag->set('success', 'Selected element has been removed successfully');

        return $this->json([
            'refresh' => true
        ]);
    }

    /**
     * Persists a category
     * 
     * @return string
     */
    public function saveAction()
    {
        $input = $this->request->getPost('category');

        $validator = $this->createValidation();

        $validator->field('category.name')
                  ->required();

        $validator->field('category.class')
                  ->addRule('minlength', null, ['min' => 2]);

        if ($validator->isPassed()) {
            $service = $this->getModuleService('categoryManager');

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
                        'redirect' => $this->createUrl('Polls:Admin:Category@editAction', [$service->getLastId()]),
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
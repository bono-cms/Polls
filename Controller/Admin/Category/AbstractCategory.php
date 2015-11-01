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

use Cms\Controller\Admin\AbstractController;
use Krystal\Validate\Pattern;

abstract class AbstractCategory extends AbstractController
{
    /**
     * Loads breadcrumbs
     * 
     * @param string $title Title of the last one
     * @return void
     */
    final protected function loadBreadcrumbs($title)
    {
        $this->view->getBreadcrumbBag()->add(array(
            array(
                'name' => 'Polls',
                'link' => 'Polls:Admin:Browser@indexAction'
            ),
            array(
                'name' => $title,
                'link' => '#'
            )
        ));
    }

    /**
     * Returns prepared validator instance
     * 
     * @param array $input Raw input data
     * @return \Krystal\Validate\ValidatorChain
     */
    final protected function getValidator(array $input)
    {
        return $this->validatorFactory->build(array(
            'input' => array(
                'source' => $input,
                'definition' => array(
                    'name' => new Pattern\Title()
                )
            )
        ));
    }

    /**
     * Returns category manager service
     * 
     * @return \Polls\Service\CategoryManager
     */
    final protected function getCategoryManager()
    {
        return $this->getModuleService('categoryManager');
    }
}

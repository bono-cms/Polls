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
     * Default action
     * 
     * @return string
     */
    public function indexAction()
    {
        $this->loadBreadcrumbs('Add new option');

        return $this->view->render('answer.form', array(
            'title' => 'Add new option',
            'option' => new VirtualEntity(),
            'categories' => $this->getModuleService('categoryManager')->fetchAsList()
        ));
    }

    /**
     * Adds a record
     * 
     * @return string
     */
    public function addAction()
    {
    }
}

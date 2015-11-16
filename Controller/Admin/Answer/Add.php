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

use Cms\Controller\Admin\AbstractController;
use Krystal\Stdlib\VirtualEntity;

final class Add extends AbstractController
{
    /**
     * Default action
     * 
     * @return string
     */
    public function indexAction()
    {
        return $this->view->render('option.form', array(
            'title' => 'Add new option',
            'option' => new VirtualEntity(),
            'categories' => array()
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

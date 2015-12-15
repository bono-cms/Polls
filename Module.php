<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Polls;

use Cms\AbstractCmsModule;
use Polls\Service\CategoryManager;
use Polls\Service\AnswerManager;

final class Module extends AbstractCmsModule
{
    /**
     * {@inhertiDco}
     */
    public function getServiceProviders()
    {
        $answerMapper = $this->getMapper('/Polls/Storage/MySQL/AnswerMapper');
        $answerManager = new AnswerManager($answerMapper);

        $categoryMapper = $this->getMapper('/Polls/Storage/MySQL/CategoryMapper');
        $categoryManager = new CategoryManager($categoryMapper, $answerMapper);

        return array(
            'categoryManager' => $categoryManager,
            'answerManager' => $answerManager
        );
    }
}

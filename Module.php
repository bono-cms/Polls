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
use Polls\Service\SiteService;
use Polls\Service\WebPageAnswerService;
use Polls\Service\WebPageSettingsService;

final class Module extends AbstractCmsModule
{
    /**
     * {@inhertiDoc}
     */
    public function getServiceProviders()
    {
        $answerMapper = $this->getMapper('/Polls/Storage/MySQL/AnswerMapper');
        $votesMapper = $this->getMapper('/Polls/Storage/MySQL/VotesMapper');

        $answerManager = new AnswerManager($answerMapper, $votesMapper);

        $categoryMapper = $this->getMapper('/Polls/Storage/MySQL/CategoryMapper');
        $categoryManager = new CategoryManager($categoryMapper, $answerMapper);

        $webPageAnswerService = new WebPageAnswerService(
            $this->getMapper('/Polls/Storage/MySQL/AnswerWebPageMapper'),
            $this->getMapper('/Polls/Storage/MySQL/WebPageVotesMapper')
        );

        $webPageSettingsMapper = $this->getMapper('/Polls/Storage/MySQL/WebPageSettingsMapper');
        $webPageSettingsService = new WebPageSettingsService($webPageSettingsMapper);

        return array(
            'webPageSettingsService' => $webPageSettingsService,
            'webPageAnswerService' => $webPageAnswerService,
            'categoryManager' => $categoryManager,
            'answerManager' => $answerManager,
            'siteService' => new SiteService($answerManager, $categoryMapper, $webPageAnswerService, $webPageSettingsMapper)
        );
    }
}

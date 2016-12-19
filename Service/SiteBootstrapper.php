<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Polls\Service;

use Cms\Service\AbstractSiteBootstrapper;

final class SiteBootstrapper extends AbstractSiteBootstrapper
{
    /**
     * {@inheritDoc}
     */
    public function bootstrap()
    {
        // Inject the $polls service in view, and append the UI script to the queue
        $this->view->addVariable('polls', $this->moduleManager->getModule('Polls')->getService('siteService'))
                   ->getPluginBag()
                   ->appendScript('@Polls/site.polls.js');

        // Append blocks
        $this->view->getPartialBag()
                   ->addPartialDir($this->view->createThemePath('Polls', 'partials'));
    }
}

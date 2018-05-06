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

use Polls\Storage\AnswerWebPageMapperInterface;

final class WebPageAnswerService
{
    /**
     * Any compliant web page mapper
     * 
     * @var \Polls\Storage\AnswerWebPageMapperInterface
     */
    private $answerWebPageMapper;

    /**
     * State initialization
     * 
     * @param $answerWebPageMapper \Polls\Storage\AnswerWebPageMapperInterface
     * @return void
     */
    public function __construct(AnswerWebPageMapperInterface $answerWebPageMapper)
    {
        $this->answerWebPageMapper = $answerWebPageMapper;
    }
}

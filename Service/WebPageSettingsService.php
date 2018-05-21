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

use Polls\Storage\WebPageSettingsMapperInterface;
use Cms\Service\AbstractManager;
use Krystal\Stdlib\VirtualEntity;

final class WebPageSettingsService extends AbstractManager implements WebPageSettingsServiceInterface
{
    /**
     * Any compliant web page settings mapper
     * 
     * @var \Polls\Storage\WebPageSettingsMapperInterface
     */
    private $webPageSettingsMapper;

    /**
     * State initialization
     * 
     * @param \Polls\Storage\WebPageSettingsMapperInterface $webPageSettingsMapper
     * @return void
     */
    public function __construct(WebPageSettingsMapperInterface $webPageSettingsMapper)
    {
        $this->webPageSettingsMapper = $webPageSettingsMapper;
    }

    /**
     * {@inheritDoc}
     */
    protected function toEntity(array $row)
    {
        $entity = new VirtualEntity(false);
        $entity->setId($row['id'], VirtualEntity::FILTER_INT)
               ->setLangId($row['lang_id'], VirtualEntity::FILTER_INT)
               ->setWebPageId($row['web_page_id'], VirtualEntity::FILTER_INT)
               ->setPublished($row['published'], VirtualEntity::FILTER_INT)
               ->setName($row['name'], VirtualEntity::FILTER_HTML);

        return $entity;
    }

    /**
     * Save web page settings
     * 
     * @param array $input
     * @return boolean
     */
    public function save(array $input)
    {
        return $this->webPageSettingsMapper->save($input);
    }

    /**
     * Find entity by attached web page ID
     * 
     * @param mixed $webPageId
     * @return array|\Krystal\Stdlib\VirtualEntity
     */
    public function findByWebPageId($webPageId)
    {
        if ($webPageId !== null) {
            $entity = $this->prepareResult($this->webPageSettingsMapper->findByWebPageId($webPageId));

            if ($entity === false) {
                return new VirtualEntity();
            } else {
                return $entity;
            }

        } else {
            return new VirtualEntity();
        }
    }
}

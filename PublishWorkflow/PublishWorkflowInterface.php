<?php

namespace Symfony\Cmf\Bundle\ContentBundle\PublishWorkflow;

interface PublishWorkflowInterface
{
    public function getIsPublished();

    public function setIsPublished($isPublished);

    public function getPublishDate();

    public function setPublishDate($publishDate);
}
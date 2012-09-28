<?php

namespace Symfony\Cmf\Bundle\ContentBundle\PublishWorkflow;

use Symfony\Component\HttpFoundation\Request;

interface PublishWorkflowCheckerInterface
{
    public function checkIsPublished($contentDocument, Request $request = null);
}
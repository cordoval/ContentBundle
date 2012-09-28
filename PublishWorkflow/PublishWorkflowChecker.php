<?php

namespace Symfony\Cmf\Bundle\ContentBundle\PublishWorkflow;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

class PublishWorkflowChecker implements PublishWorkflowCheckerInterface
{
    /**
     * @var string the role name for the security check
     */
    protected $requiredRole;

    /**
     * @var SecurityContextInterface
     */
    protected $securityContext;

    /**
     * @param string $requiredRole the role to check with the securityContext
     *      (if you pass one), defaults to everybody: IS_AUTHENTICATED_ANONYMOUSLY
     * @param \Symfony\Component\Security\Core\SecurityContextInterface|null $securityContext
     *      the security context to use to check for the role. No security
     *      check if this is null
     */
    public function __construct($requiredRole = "IS_AUTHENTICATED_ANONYMOUSLY", SecurityContextInterface $securityContext = null)
    {
        $this->requiredRole = $requiredRole;
        $this->securityContext = $securityContext;
    }

    public function checkIsPublished($contentDocument, Request $request = null)
    {
        if (!($contentDocument instanceOf PublishWorkflowInterface)) {
            return true;
        }

        if ($this->securityContext && $this->securityContext->isGranted($this->requiredRole)) {
            return true;
        }

        if ($contentDocument->getIsPublished()
            && (null === $contentDocument->getPublishDate()
                || ($request ? $request->server->get('REQUEST_TIME') : time()) >= $contentDocument->getPublishDate()->getTimestamp()
            )
        ) {
            return true;
        }

        return false;
    }
}

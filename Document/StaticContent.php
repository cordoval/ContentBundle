<?php

namespace Symfony\Cmf\Bundle\ContentBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCRODM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Cmf\Component\Routing\RouteAwareInterface;

/**
 * @PHPCRODM\Document(referenceable=true)
 */
class StaticContent implements RouteAwareInterface
{
    /**
     * to create the document at the specified location. read only for existing documents.
     *
     * @PHPCRODM\Id
     */
    protected $path;

    /**
     * @PHPCRODM\Node
     */
    public $node;

    /**
     * @Assert\NotBlank
     * @PHPCRODM\Parentdocument()
     */
    protected $parent;

    /**
     * @Assert\NotBlank
     * @PHPCRODM\Nodename()
     */
    protected $name;

    /**
     * @Assert\NotBlank
     * @PHPCRODM\String()
     */
    protected $title;

    /**
     * @PHPCRODM\String()
     */
    protected $body;

    /**
     * This will usually be a ContainerBlock but can be any block that will be
     * rendered in the additionalInfoBlock area.
     *
     * @var \Sonata\BlockBundle\Model\BlockInterface
     * @PHPCRODM\Child()
     */
    public $additionalInfoBlock;

    /**
     * @PHPCRODM\Referrers(filter="routeContent")
     */
    protected $routes;

    /**
     * Set repository path of this navigation item for creation
     */
    public function setPath($path)
    {
      $this->path = $path;
    }

    public function getPath()
    {
      return $this->path;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return array of route objects that point to this content
     */
    public function getRoutes()
    {
        return $this->routes->toArray();
    }

    public function __toString()
    {
        return $this->name;
    }
}

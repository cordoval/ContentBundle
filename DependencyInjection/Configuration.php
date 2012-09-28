<?php

namespace Symfony\Cmf\Bundle\ContentBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('symfony_cmf_content');

        $rootNode
            ->children()
                ->scalarNode('document_class')->defaultValue('Symfony\Cmf\Bundle\ContentBundle\Document\StaticContent')->end()
                ->scalarNode('default_template')->defaultValue('SymfonyCmfContentBundle:StaticContent:index.html.twig')->end()
                ->scalarNode('static_basepath')->defaultValue('/cms/content/static')->end()
                ->scalarNode('role')->defaultValue('IS_AUTHENTICATED_ANONYMOUSLY')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}

<?php

namespace LogFrontendBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('log_frontend');

        $rootNode
            ->children()
                ->scalarNode('path')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}

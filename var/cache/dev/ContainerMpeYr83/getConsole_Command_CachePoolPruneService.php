<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'console.command.cache_pool_prune' shared service.

$this->privates['console.command.cache_pool_prune'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\CachePoolPruneCommand(new RewindableGenerator(function () {
    yield 'cache.system' => ($this->services['cache.system'] ?? $this->getCache_SystemService());
    yield 'cache.validator' => ($this->privates['cache.validator'] ?? $this->getCache_ValidatorService());
    yield 'cache.serializer' => ($this->privates['cache.serializer'] ?? $this->getCache_SerializerService());
    yield 'cache.annotations' => ($this->privates['cache.annotations'] ?? $this->getCache_AnnotationsService());
    yield 'cache.app' => ($this->services['cache.app'] ?? $this->getCache_AppService());
}, 5));

$instance->setName('cache:pool:prune');

return $instance;

<?php

namespace Bitween\StructuredProgramming\Factory;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    public static function get(): EntityManagerInterface
    {
        $connection = ['driver' => 'pdo_sqlite', 'path' => __DIR__.'/../../database.sqlite'];
        $config = Setup::createAnnotationMetadataConfiguration(
            paths: [__DIR__.'/../Entity'],
            isDevMode: true,
            useSimpleAnnotationReader: false
        );

        return EntityManager::create(connection: $connection, config: $config);
    }
}

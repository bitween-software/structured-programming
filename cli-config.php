<?php

use Bitween\StructuredProgramming\Factory\EntityManagerFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__.'/vendor/autoload.php';

$entityManager = EntityManagerFactory::get();

return ConsoleRunner::createHelperSet($entityManager);

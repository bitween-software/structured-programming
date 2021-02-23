<?php

namespace Tests\Unit\Persistence;

use Bitween\StructuredProgramming\Persistence\InMemoryPersistence;
use Bitween\StructuredProgramming\Persistence\Persistence;

class InMemoryPersistenceCest extends PersistenceCest
{
    protected function getPersistence(): Persistence
    {
        return new InMemoryPersistence();
    }
}

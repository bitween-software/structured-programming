<?php

namespace Tests\Unit\Persistence;

use Bitween\StructuredProgramming\Factory\EntityManagerFactory;
use Bitween\StructuredProgramming\Persistence\DoctrinePersistence;
use Bitween\StructuredProgramming\Persistence\Persistence;
use Tests\UnitTester;

class DoctrinePersistenceCest extends PersistenceCest
{
    use ClearsDoctrineDatabase;

    public function _before(UnitTester $I): void
    {
        $this->clearDatabase();
    }

    protected function getPersistence(): Persistence
    {
        $entityManager = EntityManagerFactory::get();

        return new DoctrinePersistence($entityManager);
    }
}

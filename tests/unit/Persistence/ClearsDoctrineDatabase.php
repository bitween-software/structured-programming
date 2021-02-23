<?php

namespace Tests\Unit\Persistence;

trait ClearsDoctrineDatabase
{
    public function clearDatabase(): void
    {
        exec('vendor/bin/doctrine orm:schema-tool:drop --force');
        exec('vendor/bin/doctrine orm:schema-tool:create');
    }
}

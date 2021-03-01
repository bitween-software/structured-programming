<?php

namespace Bitween\StructuredProgramming\Persistence;

use Bitween\StructuredProgramming\Entity\Post;

class InMemoryPersistence implements Persistence
{
    /**
     * @var Post[]
     */
    private array $storage = [];

    public function store(Post $post): void
    {
        $this->storage[] = $post;
    }

    public function get(): array
    {
        return $this->storage;
    }
}

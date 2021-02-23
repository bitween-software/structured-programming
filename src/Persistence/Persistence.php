<?php

namespace Bitween\StructuredProgramming\Persistence;

use Bitween\StructuredProgramming\Entity\Post;

interface Persistence
{
    public function store(Post $post): void;

    /**
     * @return Post[]
     */
    public function get(): array;
}

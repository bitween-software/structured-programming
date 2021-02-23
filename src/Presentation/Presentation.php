<?php

namespace Bitween\StructuredProgramming\Presentation;

use Bitween\StructuredProgramming\Entity\Post;

interface Presentation
{
    /**
     * @param Post[]|Post $data
     */
    public function present(array | Post $data): string;
}

<?php

namespace Bitween\StructuredProgramming\Validator;

use Bitween\StructuredProgramming\Entity\Post;
use Bitween\StructuredProgramming\Exception\InvalidPostException;

interface Validator
{
    /**
     * @throws InvalidPostException
     */
    public function validate(Post $post): void;
}

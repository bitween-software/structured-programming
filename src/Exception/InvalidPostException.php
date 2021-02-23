<?php

namespace Bitween\StructuredProgramming\Exception;

use Bitween\StructuredProgramming\Entity\Post;
use Exception;

class InvalidPostException extends Exception
{
    public function __construct(Post $post)
    {
        $message = sprintf('The post with title "%s" was invalid!', $post->getTitle());

        parent::__construct($message);
    }
}

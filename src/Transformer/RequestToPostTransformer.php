<?php

namespace Bitween\StructuredProgramming\Transformer;

use Bitween\StructuredProgramming\Entity\Post;
use Bitween\StructuredProgramming\Request\Request;

class RequestToPostTransformer
{
    public function transform(Request $request): Post
    {
        $post = new Post();

        if ($request->has('description')) {
            $post->setDescription($request->get('description'));
        }

        if ($request->has('title')) {
            $post->setTitle($request->get('title'));
        }

        return $post;
    }
}

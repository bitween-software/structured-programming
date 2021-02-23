<?php

namespace Bitween\StructuredProgramming\UseCase;

use Bitween\StructuredProgramming\Exception\InvalidPostException;
use Bitween\StructuredProgramming\Persistence\Persistence;
use Bitween\StructuredProgramming\Presentation\Presentation;
use Bitween\StructuredProgramming\Request\Request;
use Bitween\StructuredProgramming\Transformer\RequestToPostTransformer;
use Bitween\StructuredProgramming\Validator\Validator;

class PostUseCase
{
    public function __construct(
        private RequestToPostTransformer $transformer,
        private Persistence $persistence,
        private Validator $validator,
        private Presentation $presentation
    ) {
    }

    /**
     * @throws InvalidPostException
     */
    public function store(Request $request): string
    {
        $post = $this->transformer->transform($request);

        $this->validator->validate($post);

        $this->persistence->store($post);

        return $this->presentation->present($post);
    }

    public function get(): string
    {
        $posts = $this->persistence->get();

        return $this->presentation->present($posts);
    }
}

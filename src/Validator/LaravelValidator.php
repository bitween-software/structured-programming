<?php

namespace Bitween\StructuredProgramming\Validator;

use Bitween\StructuredProgramming\Entity\Post;
use Bitween\StructuredProgramming\Exception\InvalidPostException;
use Illuminate\Validation\Factory;

class LaravelValidator implements Validator
{
    public const VALIDATION_RULES = [
        'title' => 'required|regex:/^[A-Za-z\s]*$/',
        'description' => 'required|regex:/^[A-Za-z\s]*$/',
    ];

    public function __construct(private Factory $factory)
    {
    }

    public function validate(Post $post): void
    {
        $values = $this->getValidationValues($post);
        $rules = self::VALIDATION_RULES;

        $validator = $this->factory->make($values, $rules);
        if ($validator->fails()) {
            throw new InvalidPostException($post);
        }
    }

    /**
     * @return string[]
     */
    private function getValidationValues(Post $post): array
    {
        return [
            'title' => $post->getTitle(),
            'description' => $post->getDescription(),
        ];
    }
}

<?php

namespace Bitween\StructuredProgramming\Validator;

use Bitween\StructuredProgramming\Entity\Post;
use Bitween\StructuredProgramming\Exception\InvalidPostException;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class SymfonyValidator implements Validator
{
    public function __construct(private ValidatorInterface $decorated)
    {
    }

    public function validate(Post $post): void
    {
        $toBeValidated = [
            $post->getTitle(),
            $post->getDescription(),
        ];

        foreach ($toBeValidated as $value) {
            if (0 !== $this->getViolations($value)->count()) {
                throw new InvalidPostException($post);
            }
        }
    }

    private function getViolations(mixed $value): ConstraintViolationListInterface
    {
        return $this->decorated->validate(
            $value,
            [
                new NotBlank(),
                new Regex('/^[A-Za-z\s]*$/'),
            ]
        );
    }
}

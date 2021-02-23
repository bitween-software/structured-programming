<?php

namespace Bitween\StructuredProgramming\Validator;

use Bitween\StructuredProgramming\Entity\Post;
use Bitween\StructuredProgramming\Exception\InvalidPostException;

class CValidator implements Validator
{
    /**
     * @throws InvalidPostException
     */
    public function validate(Post $post): void
    {
        $normalizedPostTitle = $this->deSpacedString($post->getTitle());
        $normalizedPostDescription = $this->deSpacedString($post->getDescription());

        if (!$this->isOnlyAlpha($normalizedPostTitle) || !$this->isOnlyAlpha($normalizedPostDescription)) {
            throw new InvalidPostException($post);
        }
    }

    private function deSpacedString(string $input): string
    {
        return str_replace(' ', '', $input);
    }

    private function isOnlyAlpha(string $normalizedPostTitle): bool
    {
        return ctype_alpha($normalizedPostTitle);
    }
}

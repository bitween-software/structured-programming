<?php

namespace Bitween\StructuredProgramming\Presentation;

use Bitween\StructuredProgramming\Entity\Post;
use JsonException;

class JSONPresentation implements Presentation
{
    /**
     * {@inheritDoc}
     *
     * @throws JsonException
     */
    public function present(array | Post $data): string
    {
        if ($data instanceof Post) {
            return $this->encodeSingle($data);
        }

        return $this->encodeMultiple($data);
    }

    /**
     * @throws JsonException
     */
    private function encodeSingle(Post $data): string
    {
        return json_encode(
            [
                'title' => $data->getTitle(),
                'description' => $data->getDescription(),
            ],
            JSON_THROW_ON_ERROR
        );
    }

    /**
     * @param Post[] $posts
     *
     * @throws JsonException
     */
    private function encodeMultiple(array $posts): string
    {
        return json_encode(
            array_map(
                fn (Post $post): array => [
                    'title' => $post->getTitle(),
                    'description' => $post->getDescription(),
                ],
                $posts
            ),
            JSON_THROW_ON_ERROR
        );
    }
}

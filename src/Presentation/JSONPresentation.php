<?php

namespace Bitween\StructuredProgramming\Presentation;

use Bitween\StructuredProgramming\Entity\Post;

class JSONPresentation implements Presentation
{
    public function present(array | Post $data): string
    {
        if ($data instanceof Post) {
            return json_encode([
                'title' => $data->getTitle(),
                'description' => $data->getDescription(),
            ]);
        }

        $postsData = [];

        foreach ($data as $post) {
            $postsData[] = [
                'title' => $post->getTitle(),
                'description' => $post->getDescription(),
            ];
        }

        return json_encode($postsData);
    }
}

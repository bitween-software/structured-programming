<?php

namespace Bitween\StructuredProgramming\Presentation;

use Bitween\StructuredProgramming\Entity\Post;

class HTMLPresentation implements Presentation
{
    public function present(array | Post $data): string
    {
        if ($data instanceof Post) {
            return sprintf('<div><span>Title: %s</span><span>Description: %s</span></div>', $data->getTitle(), $data->getDescription());
        }

        $html = '<table><thead><th>Title</th><th>Description</th></thead><tbody>';

        foreach ($data as $post) {
            $html .= sprintf('<tr><td>%s</td><td>%s</td></tr>', $post->getTitle(), $post->getDescription());
        }

        $html .= '</tbody></table>';

        return $html;
    }
}

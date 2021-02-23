<?php

namespace Tests\Unit\Entity;

use Bitween\StructuredProgramming\Entity\Post;
use Tests\UnitTester;

class PostCest
{
    public function aPostHasATitle(UnitTester $I): void
    {
        $post = new Post();
        $I->assertEquals('', $post->getTitle());

        $post->setTitle('This is my post');
        $I->assertEquals('This is my post', $post->getTitle());
    }

    public function aPostHasADescription(UnitTester $I): void
    {
        $post = new Post();
        $I->assertEquals('', $post->getDescription());

        $post->setDescription('Some awesome post content.');
        $I->assertEquals('Some awesome post content.', $post->getDescription());
    }
}

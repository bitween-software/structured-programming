<?php

namespace Tests\Unit\Presentation;

use Bitween\StructuredProgramming\Entity\Post;
use Bitween\StructuredProgramming\Presentation\HTMLPresentation;
use Tests\UnitTester;

class HTMLPresentationCest
{
    public function itPresentsMultiplePostsAsAnHTMLTable(UnitTester $I): void
    {
        $posts = [
            (new Post())->setDescription('Hi everyone, this is my first post!')
                ->setTitle('My first post'),

            (new Post())->setTitle('My second post')
                ->setDescription('I also have a second post, enjoy :)!'),
        ];

        $presentation = new HTMLPresentation();

        $actualHTMLTable = $presentation->present($posts);
        $expectedHTMLTable = '<table><thead><th>Title</th><th>Description</th></thead><tbody><tr><td>My first post</td><td>Hi everyone, this is my first post!</td></tr><tr><td>My second post</td><td>I also have a second post, enjoy :)!</td></tr></tbody></table>';

        $I->assertEquals($expectedHTMLTable, $actualHTMLTable);
    }

    public function itPresentsASinglePostAsAList(UnitTester $I): void
    {
        $singlePost = (new Post())->setDescription('My post is cool')->setTitle('And this is the title');

        $presentation = new HTMLPresentation();

        $actualHTMLList = $presentation->present($singlePost);
        $expectedHTMLList = '<div><span>Title: And this is the title</span><span>Description: My post is cool</span></div>';

        $I->assertEquals($expectedHTMLList, $actualHTMLList);
    }
}

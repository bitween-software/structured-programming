<?php

namespace Tests\Unit\Presentation;

use Bitween\StructuredProgramming\Entity\Post;
use Bitween\StructuredProgramming\Presentation\JSONPresentation;
use Tests\UnitTester;

class JSONPresentationCest
{
    public function itPresentsMultiplePostsAsAJSONArray(UnitTester $I): void
    {
        $posts = [
            (new Post())->setDescription('Hi everyone, this is my first post!')
                ->setTitle('My first post'),

            (new Post())->setTitle('My second post')
                ->setDescription('I also have a second post, enjoy :)!'),
        ];

        $presentation = new JSONPresentation();

        $actualJsonString = $presentation->present($posts);
        $expectedJsonString = json_encode([
            [
                'title' => 'My first post',
                'description' => 'Hi everyone, this is my first post!',
            ],

            [
                'title' => 'My second post',
                'description' => 'I also have a second post, enjoy :)!',
            ],
        ]);

        $I->assertJsonStringEqualsJsonString($expectedJsonString, $actualJsonString);
    }

    public function itPresentsASinglePostAsAJsonObject(UnitTester $I): void
    {
        $singlePost = (new Post())->setTitle('My post')->setDescription('Hi everyone, this is a post!');

        $presentation = new JSONPresentation();

        $actualJsonObject = $presentation->present($singlePost);
        $expectedJsonObject = json_encode(['title' => 'My post', 'description' => 'Hi everyone, this is a post!']);

        $I->assertEquals($expectedJsonObject, $actualJsonObject);
    }
}

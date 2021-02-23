<?php

namespace Tests\Unit\Transformer;

use Bitween\StructuredProgramming\Entity\Post;
use Bitween\StructuredProgramming\Request\ConfiguredRequest;
use Bitween\StructuredProgramming\Transformer\RequestToPostTransformer;
use Codeception\Example;
use Tests\UnitTester;

class RequestToPostTransformerCest
{
    /**
     * @dataProvider provideRequestData
     */
    public function itTransformsARequestToAPost(UnitTester $I, Example $example): void
    {
        $transformer = new RequestToPostTransformer();
        $request = new ConfiguredRequest($example->getIterator()->getArrayCopy());

        $actualPost = $transformer->transform($request);
        $expectedPost = (new Post())->setTitle($example['title'] ?? '')->setDescription($example['description'] ?? '');

        $I->assertEquals($expectedPost, $actualPost);
    }

    public function provideRequestData(): array
    {
        return [
            'Title and description' => ['title' => 'The post title', 'description' => 'The post description'],
            'Only title' => ['title' => 'Only the title'],
            'Only description' => ['description' => 'Only the description'],
            'No data' => ['No relevant data'],
        ];
    }
}

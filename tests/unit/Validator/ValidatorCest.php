<?php

namespace Tests\Unit\Validator;

use Bitween\StructuredProgramming\Entity\Post;
use Bitween\StructuredProgramming\Exception\InvalidPostException;
use Bitween\StructuredProgramming\Validator\Validator;
use Codeception\Example;
use Tests\UnitTester;

abstract class ValidatorCest
{
    /**
     * @dataProvider provideInvalidPosts
     */
    public function itThrowsAnExceptionOnAnInvalidPost(UnitTester $I, Example $example): void
    {
        $validator = $this->getValidator();

        $post = new Post();
        $post->setTitle($example['title']);
        $post->setDescription($example['description']);

        $I->expectThrowable(InvalidPostException::class, function () use ($validator, $post) {
            $validator->validate($post);
        });
    }

    protected function provideInvalidPosts(): array
    {
        return [
            'Invalid title' => ['title' => 123, 'description' => 'A valid description'],
            'Invalid description' => ['title' => 'A valid title', 'description' => 456],
            'Both invalid title and description' => ['title' => 123, 'description' => 456],
        ];
    }

    public function itDoesNotThrowAnExceptionOnAValidPost(UnitTester $I): void
    {
        $validator = $this->getValidator();

        $post = new Post();
        $post->setTitle('A Valid post title');
        $post->setDescription('This is a valid description');

        $validator->validate($post);
    }

    abstract protected function getValidator(): Validator;
}

<?php

namespace Tests\Unit\Exception;

use Bitween\StructuredProgramming\Entity\Post;
use Bitween\StructuredProgramming\Exception\InvalidPostException;
use Tests\UnitTester;

class InvalidPostExceptionCest
{
    public function itHasAMessage(UnitTester $I): void
    {
        $invalidPost = new Post();
        $invalidPost->setTitle('My post');
        $invalidPost->setDescription(1234);

        $exception = new InvalidPostException($invalidPost);

        $I->assertEquals('The post with title "My post" was invalid!', $exception->getMessage());
    }
}

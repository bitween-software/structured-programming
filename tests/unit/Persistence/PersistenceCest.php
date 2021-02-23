<?php

namespace Tests\Unit\Persistence;

use Bitween\StructuredProgramming\Entity\Post;
use Bitween\StructuredProgramming\Persistence\Persistence;
use Tests\UnitTester;

abstract class PersistenceCest
{
    public function itStoresASinglePost(UnitTester $I): void
    {
        $persistence = $this->getPersistence();

        $post = new Post();
        $post->setTitle('My post title');
        $post->setDescription('My post description');

        $persistence->store($post);

        $allPosts = $persistence->get();
        $I->assertCount(1, $allPosts, 'There is more than one post stored.');
        $I->assertContainsEquals($post, $allPosts, 'The post is not stored correctly.');
    }

    public function itStoresMultiplePosts(UnitTester $I): void
    {
        $persistence = $this->getPersistence();

        $postOne = new Post();
        $postOne->setTitle('My first post title');
        $postOne->setDescription('My first post description');

        $postTwo = new Post();
        $postTwo->setTitle('My second post title');
        $postTwo->setDescription('My second post description');

        $persistence->store($postOne);
        $persistence->store($postTwo);

        $allPosts = $persistence->get();
        $I->assertCount(2, $allPosts);
        $I->assertContainsEquals($postOne, $allPosts, 'The first post is not stored correctly.');
        $I->assertContainsEquals($postTwo, $allPosts, 'The second post is not stored correctly.');
    }

    public function itIsEmptyByDefault(UnitTester $I): void
    {
        $persistence = $this->getPersistence();

        $allPosts = $persistence->get();
        $I->assertCount(0, $allPosts, 'The persistence layer is not empty by default.');
    }

    abstract protected function getPersistence(): Persistence;
}

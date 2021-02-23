<?php

namespace Bitween\StructuredProgramming\Persistence;

use Bitween\StructuredProgramming\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;

class DoctrinePersistence implements Persistence
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function store(Post $post): void
    {
        $this->entityManager->persist($post);
        $this->entityManager->flush();
    }

    public function get(): array
    {
        return $this->entityManager->getRepository(Post::class)->findAll();
    }
}

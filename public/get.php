<?php

use Bitween\StructuredProgramming\Factory\EntityManagerFactory;
use Bitween\StructuredProgramming\Persistence\DoctrinePersistence;
use Bitween\StructuredProgramming\Presentation\HTMLPresentation;
use Bitween\StructuredProgramming\Transformer\RequestToPostTransformer;
use Bitween\StructuredProgramming\UseCase\PostUseCase;
use Bitween\StructuredProgramming\Validator\CValidator;

require_once dirname(__DIR__).'/vendor/autoload.php';

$useCase = new PostUseCase(
    new RequestToPostTransformer(),
    new DoctrinePersistence(EntityManagerFactory::get()),
    new CValidator(),
    new HTMLPresentation()
);

$response = $useCase->get();

echo $response;

<?php

namespace Tests\Acceptance;

use Bitween\StructuredProgramming\Persistence\InMemoryPersistence;
use Bitween\StructuredProgramming\Presentation\JSONPresentation;
use Bitween\StructuredProgramming\Request\ConfiguredRequest;
use Bitween\StructuredProgramming\Transformer\RequestToPostTransformer;
use Bitween\StructuredProgramming\UseCase\PostUseCase;
use Bitween\StructuredProgramming\Validator\CValidator;
use Tests\AcceptanceTester;

class PostUseCaseCest
{
    public function iCanStoreAPost(AcceptanceTester $I): void
    {
        $I->expect('To be able to store a post without an error being thrown.');

        $useCase = new PostUseCase(
            new RequestToPostTransformer(),
            new InMemoryPersistence(),
            new CValidator(),
            new JSONPresentation()
        );

        $request = new ConfiguredRequest([
            'title' => 'My new post',
            'description' => 'This is my new post',
        ]);

        $useCase->store($request);
    }

    public function iCanGetAllPosts(AcceptanceTester $I): void
    {
        $I->expect('To get all the posts without any errors.');

        $useCase = new PostUseCase(
            new RequestToPostTransformer(),
            new InMemoryPersistence(),
            new CValidator(),
            new JSONPresentation()
        );

        $useCase->get();
    }
}

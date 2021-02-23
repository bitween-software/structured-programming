<?php

namespace Tests\Unit\Request;

use Bitween\StructuredProgramming\Request\HTTPRequest;
use Error;
use Tests\UnitTester;

class HTTPRequestCest
{
    public function itGetsDataFromThePostSuperGlobal(UnitTester $I): void
    {
        $_POST['foo'] = 'bar';
        $_POST['key'] = 'value';

        $request = new HTTPRequest();

        $I->assertTrue($request->has('foo'));
        $I->assertTrue($request->has('key'));
        $I->assertFalse($request->has('baz'));

        $I->assertEquals('bar', $request->get('foo'));
        $I->assertEquals('value', $request->get('key'));
        $I->expectThrowable(Error::class, function () use ($request) {
            $request->get('baz');
        });
    }
}

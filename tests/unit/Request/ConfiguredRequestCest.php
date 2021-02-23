<?php

namespace Tests\Unit\Request;

use Bitween\StructuredProgramming\Request\ConfiguredRequest;
use Error;
use Tests\UnitTester;

class ConfiguredRequestCest
{
    public function itGetsDataFromConfiguration(UnitTester $I): void
    {
        $request = new ConfiguredRequest([
            'foo' => 'bar',
            'key' => 'value',
        ]);

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

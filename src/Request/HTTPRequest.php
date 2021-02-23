<?php

namespace Bitween\StructuredProgramming\Request;

class HTTPRequest implements Request
{
    public function has(mixed $key): bool
    {
        return array_key_exists($key, $_POST);
    }

    public function get(mixed $key): mixed
    {
        assert($this->has($key));

        return $_POST[$key];
    }
}

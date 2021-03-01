<?php

namespace Bitween\StructuredProgramming\Request;

class ConfiguredRequest implements Request
{
    /**
     * @param mixed[] $data
     */
    public function __construct(private array $data)
    {
    }

    public function has(mixed $key): bool
    {
        return array_key_exists($key, $this->data);
    }

    public function get(mixed $key): mixed
    {
        assert($this->has($key));

        return $this->data[$key];
    }
}

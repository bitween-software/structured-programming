<?php

namespace Bitween\StructuredProgramming\Request;

interface Request
{
    public function has(mixed $key): bool;

    public function get(mixed $key): mixed;
}

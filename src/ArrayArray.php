<?php

namespace TypedArray;

final class ArrayArray extends AbstractTypedArray
{
    public function __construct()
    {
        parent::__construct('is_array', 'array');
    }
}

<?php

namespace TypedArray;

final class IntArray extends AbstractTypedArray
{
    public function __construct()
    {
        parent::__construct('is_int', 'integer');
    }
}

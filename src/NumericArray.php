<?php

namespace TypedArray;

final class NumericArray extends AbstractTypedArray
{
    public function __construct()
    {
        parent::__construct('is_numeric', 'numeric value');
    }
}

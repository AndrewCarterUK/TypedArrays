<?php

namespace TypedArray;

final class FloatArray extends AbstractTypedArray
{
    public function __construct()
    {
        parent::__construct('is_float', 'float');
    }
}

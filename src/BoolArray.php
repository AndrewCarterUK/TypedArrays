<?php

namespace TypedArray;

final class BoolArray extends AbstractTypedArray
{
    public function __construct()
    {
        parent::__construct('is_bool', 'boolean');
    }
}

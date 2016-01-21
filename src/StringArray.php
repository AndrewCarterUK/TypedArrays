<?php

namespace TypedArray;

final class StringArray extends AbstractTypedArray
{
    public function __construct()
    {
        parent::__construct('is_string', 'string');
    }
}

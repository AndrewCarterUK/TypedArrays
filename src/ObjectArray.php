<?php

namespace TypedArray;

final class ObjectArray extends AbstractTypedArray
{
    public function __construct()
    {
        parent::__construct('is_object', 'object');
    }
}

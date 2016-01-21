<?php

namespace TypedArray;

final class ScalarArray extends AbstractTypedArray
{
    public function __construct()
    {
        parent::__construct('is_scalar', 'scalar');
    }
}

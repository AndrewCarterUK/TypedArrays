<?php

namespace TypedArray;

final class CallableArray extends AbstractTypedArray
{
    public function __construct()
    {
        parent::__construct('is_callable', 'callable');
    }
}

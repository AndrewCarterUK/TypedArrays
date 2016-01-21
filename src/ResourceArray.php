<?php

namespace TypedArray;

final class ResourceArray extends AbstractTypedArray
{
    public function __construct()
    {
        parent::__construct('is_resource', 'resource');
    }
}

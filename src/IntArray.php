<?php

namespace TypedArray;

final class IntArray extends AbstractTypedArray
{
    /**
     * @param array|null $source The source array
     */
    public function __construct(array $source = null)
    {
        parent::__construct('is_int', 'integer', $source);
    }
}

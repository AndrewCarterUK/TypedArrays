<?php

namespace TypedArray;

final class NumericArray extends AbstractTypedArray
{
    /**
     * @param array|null $source The source array
     */
    public function __construct(array $source = null)
    {
        parent::__construct('is_numeric', 'numeric value', $source);
    }
}

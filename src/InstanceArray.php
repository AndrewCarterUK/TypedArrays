<?php

namespace TypedArray;

final class InstanceArray extends AbstractTypedArray
{
    /**
     * @param string $class The class path that array entries must be an instance of
     */
    public function __construct($class)
    {
        parent::__construct(function ($value) use ($class) {
            return $value instanceof $class;
        }, $class);
    }
}

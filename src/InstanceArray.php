<?php

namespace TypedArray;

final class InstanceArray extends AbstractTypedArray
{
    /**
     * @param string $class The class path that array entries must be an instance of
     * @param array|null $source The source array
     */
    public function __construct($class, array $source = null)
    {
        parent::__construct(function ($value) use ($class) {
            return $value instanceof $class;
        }, $class, $source);
    }
}

<?php

namespace TypedArray;

abstract class AbstractTypedArray extends \ArrayIterator
{
    /**
     * @var callable
     */
    private $test;

    /**
     * @var string
     */
    private $type;

    /**
     * @param callable $test The validation test to perform on new array entries
     * @param string $type The name of the intended type
     */
    public function __construct(callable $test, $type)
    {
        $this->test = $test;
        $this->type = $type;

        parent::__construct();
    }

    public function offsetSet($index, $newval)
    {
        if (!call_user_func($this->test, $newval)) {
            throw new \InvalidArgumentException('Expected ' . $this->type . ', got ' . gettype($newval));
        }

        return parent::offsetSet($index, $newval);
    }
}

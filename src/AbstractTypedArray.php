<?php

namespace TypedArray;

abstract class AbstractTypedArray extends \ArrayObject
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
     * @param array|null The source array
     */
    public function __construct(callable $test, $type, array $source = null)
    {
        $this->test = $test;
        $this->type = $type;

        if (null !== $source) {
            $this->verify($source);

            parent::__construct($source);
        } else {
            parent::__construct();
        }
    }

    public function offsetSet($index, $newval)
    {
        $this->verifyValue($newval);

        return parent::offsetSet($index, $newval);
    }

    private function verify(array $source)
    {
        foreach ($source as $value) {
            $this->verifyValue($value);
        }
    }

    private function verifyValue($value)
    {
        if (!call_user_func($this->test, $value)) {
            throw new \InvalidArgumentException('Expected ' . $this->type . ', got ' . gettype($value));
        }
    }

    public function getIterator()
    {
        return new \ArrayIterator($this);
    }


}

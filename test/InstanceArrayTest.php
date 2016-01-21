<?php

namespace TypedArray\Test;

use TypedArray\InstanceArray;

class InstanceArrayTest extends \PHPUnit_Framework_TestCase
{
    public function testInstanceArray()
    {
        $array = new InstanceArray('Exception');

        $array[] = new \Exception;
        $array[] = new \InvalidArgumentException;

        $this->assertInstanceOf('Exception', $array[0]);
        $this->assertInstanceOf('InvalidArgumentException', $array[1]);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInstanceArrayException()
    {
        $array = new InstanceArray('InvalidArgumentException');
        $array[] = new \Exception;
    }
}

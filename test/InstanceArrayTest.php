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

        // Build from source should be equivalent
        $arrayFromSource = new InstanceArray('Exception', array($array[0], $array[1]));
        $this->assertEquals($array, $arrayFromSource);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInstanceArrayException()
    {
        $array = new InstanceArray('InvalidArgumentException');
        $array[] = new \Exception;
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInstanceArrayFromSourceException()
    {
        new InstanceArray('InvalidArgumentException', array(new \Exception));
    }
}

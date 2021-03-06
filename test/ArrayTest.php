<?php

namespace TypedArray\Test;

class ArrayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider arrayProvider
     */
    public function testArray($class, array $values)
    {
        $array = new $class();

        // Build an array using general array access
        array_map(function ($value) use ($array) {
            $array[] = $value;
        }, $values);

        // Check elements are the same
        $this->assertSame(count($values), count($array));

        for ($i = 0; $i < count($values); $i++) {
            $this->assertSame($values[$i], $array[$i]);
        }

        // Build an array from source
        $arrayFromSource = new $class($values);
        $this->assertEquals($array, $arrayFromSource);
    }

    /**
     * @dataProvider arrayProvider
     */
    public function testNestedIteration($class, array $values)
    {
        $array = new $class();

        // Build an array using general array access
        array_map(function ($value) use ($array) {
            $array[] = $value;
        }, $values);

        $length = count($array);
        $outerSteps = 0;
        $allSteps = 0;

        foreach ($array as $outerItem) {
            $outerSteps++;
            $innerSteps = 0;

            foreach ($array as $innerItem) {
                $innerSteps++;
                $allSteps++;
            }
    
            $this->assertEquals($length, $innerSteps, 'Wrong number of inner-iterations within outer step ' . $outerSteps);
        }

        $this->assertEquals($length, $outerSteps, 'Wrong number of outer-iterations');
        $this->assertEquals($length * $length, $allSteps, 'Wrong number of combined iterations');
    }

    public function arrayProvider()
    {
        return array(
            array('TypedArray\\ArrayArray', array(array())),
            array('TypedArray\\BoolArray', array(true, false)),
            array('TypedArray\\CallableArray', array(function () {}, 'is_int')),
            array('TypedArray\\FloatArray', array(1.0, -1.23)),
            array('TypedArray\\IntArray', array(1, -1, 2, 3)),
            array('TypedArray\\NumericArray', array(0, -1, 1, '4', '12E-4', 1.23)),
            array('TypedArray\\ObjectArray', array(new \stdClass(), new \Exception)),
            array('TypedArray\\ResourceArray', array(STDIN, STDOUT)),
            array('TypedArray\\ScalarArray', array('foo', 1, 2.3, true)),
            array('TypedArray\\StringArray', array('foo', 'bar', 'hello world')),
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider exceptionProvider
     */
    public function testException($class, $value)
    {
        $array = new $class();
        $array[] = $value;
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider exceptionProvider
     */
    public function testExceptionFromSource($class, $value)
    {
        new $class(array($value));
    }

    public function exceptionProvider()
    {
        return array(
            array('TypedArray\\ArrayArray', new \stdClass()),
            array('TypedArray\\BoolArray', 1),
            array('TypedArray\\CallableArray', 'whooopeeeey'),
            array('TypedArray\\FloatArray', 1),
            array('TypedArray\\IntArray', '4'),
            array('TypedArray\\NumericArray', 'x4'),
            array('TypedArray\\ObjectArray', array()),
            array('TypedArray\\ResourceArray', 'la'),
            array('TypedArray\\ScalarArray', new \stdClass()),
            array('TypedArray\\StringArray', 4),
        );
    }
}

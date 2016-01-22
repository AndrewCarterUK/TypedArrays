<?php

namespace TypedArray\Test;

class IterationTest extends \PHPUnit_Framework_TestCase
{
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
        foreach($array as $outerItem){
            $outerSteps++;
            $innerSteps = 0;
            foreach($array as $innerItem){
                $innerSteps++;
                $allSteps++;
            }
            $this->assertEquals($length, $innerSteps,"Wrong number of inner-iterations within outer step $outerSteps");
        }
        $this->assertEquals($length, $outerSteps, "Wrong number of outer-iterations");

        $this->assertEquals($length * $length, $allSteps, "Wrong number of combined iterations");
    }

    public function arrayProvider()
    {
        return array(
            array('TypedArray\\ArrayArray', array(array("hello"), array("world"))),
            array('TypedArray\\BoolArray', array(true, false)),
            array('TypedArray\\CallableArray', array(function () {}, 'is_int')),
            array('TypedArray\\FloatArray', array(1.0, -1.23)),
            array('TypedArray\\IntArray', array(1, -1, 2, 3)),
            array('TypedArray\\NumericArray', array(0, -1, 1, '4', '12E-4', 1.23)),
            array('TypedArray\\ObjectArray', array(new \stdClass(), new \Exception)),
            array('TypedArray\\ResourceArray', array(STDIN, STDOUT)),
            array('TypedArray\\ScalarArray', array('foo', 1, 2.3, true)),
            array('TypedArray\\StringArray', array('foo', 'bar', 'hello world')),
            array('TypedArray\\IntArray', array(/* Zero items*/ )),
            array('TypedArray\\IntArray', array(1 /* One item only*/ )),
        );
    }
}

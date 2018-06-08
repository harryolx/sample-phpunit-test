<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 5/15/18
 * Time: 6:56 PM
 */

namespace Sample\Tests\unit;

use Sample\Exception\InvalidShapeException;
use Sample\Exception\InvalidShapeParameterException;
use function Sample\Helper\readInputRectangle;
use function Sample\Helper\readShape;

class ReaderHelperTest extends Base
{
    function testReadShape()
    {
        $this->assertEquals(
            'Rectangle (10,10) width=30 height=40',
            readShape('rectangle x=10 y=10 width=30 height=40')
        );
    }

    function testReadShapeThrowException()
    {
        $this->expectException(InvalidShapeException::class);
        readShape('abstractshape x=10 y=10 width=30 height=40');
    }

    function testReadInputRectangle()
    {
        $this->assertEquals(
            'Rectangle (10,10) width=30 height=40',
            readInputRectangle(['Rectangle', 'x=10', 'y=10', 'width=30', 'height=40'])
        );
    }

    function testReadInputRectangleThrowException()
    {
        $this->expectException(InvalidShapeParameterException::class);
        readInputRectangle(['Rectangle', 'x=10', 'y=10', 'w=30', 'h=40']);
    }
}
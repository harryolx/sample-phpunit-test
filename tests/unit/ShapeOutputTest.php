<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 6/8/18
 * Time: 9:05 AM
 */

namespace Sample\Tests\unit;

use Sample\Exception\InvalidShapeParameterException;
use Sample\Shape\Circle;
use Sample\Shape\Ellipse;
use Sample\Shape\Point;
use Sample\Shape\Rectangle;
use Sample\Shape\Square;
use Sample\Shape\TextBox;

class ShapeOutputTest extends Base
{
    public function testOutputSquare()
    {
        $this->assertEquals(
            'Square (10,10) size=5',
            new Square(
                new Point(10,10),
                5)
            );
    }

    public function testSquareInvalidParameters()
    {
        $this->expectException(InvalidShapeParameterException::class);
        new Square(
            new Point(10, 10),
            0
        );
    }

    public function testRectangleInvalidParameters()
    {
        $this->expectException(InvalidShapeParameterException::class);
        new Rectangle(
            new Point(10, 10),
            5,
            5
        );
    }

    public function testOutputRectangle()
    {
        $this->assertEquals(
            'Rectangle (10,10) width=5 height=10',
            new Rectangle(
                new Point(10,10),
                5,
                10
            )
        );
    }

    public function testCircle()
    {
        $this->assertEquals(
            'Circle (10,10) size=6',
            new Circle(
                new Point(10,10),
                6
            )
        );
    }

    public function testCircleInvalidParameters()
    {
        $this->expectException(InvalidShapeParameterException::class);
        new Circle(
            new Point(10, 10),
            0
        );
    }

    public function testEllipse()
    {
        $this->assertEquals(
            'Ellipse (20,20) diameterH = 5 diameterV = 10',
            new Ellipse(
                new Point(20,20),
                5,
                10
            )
        );
    }

    public function testEllipseInvalidParameters()
    {
        $this->expectException(InvalidShapeParameterException::class);
        new Ellipse(
            new Point(10, 10),
            5,
            5
        );
    }

    public function testTextBox()
    {
        $this->assertEquals(
            'TextBox (20,20) width=5 height=10 Text="text inside the box"',
            new TextBox(
                new Point(20,20),
                5,
                10,
                'text inside the box'
            ));
    }
}
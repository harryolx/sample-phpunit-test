<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 5/15/18
 * Time: 6:39 PM
 */

namespace Sample\Helper;

use Sample\Exception\InvalidShapeException;
use Sample\Exception\InvalidShapeParameterException;

function readShape(string $input) : \Sample\Shape\ShapeAbstract
{
    $parameters = explode(' ', $input);

    switch ($parameters[0]) {
        case \Sample\Shape\Rectangle::SHAPE_TYPE:
            return readInputRectangle($parameters);
            break;
        default:
            throw new InvalidShapeException('wrong shape type');
    }
}

function readInputRectangle(array $parameters) : \Sample\Shape\Rectangle
{
    $shapeParameter = [];

    foreach ($parameters as $parameter) {
        $attributes = explode("=", $parameter);

        if (count($attributes) === 2) {
            $attributeName = $attributes[0];
            $attributeValue = $attributes[1];

            switch ($attributeName) {
                case 'x':
                    $shapeParameter['x'] = $attributeValue;
                    break;
                case 'y':
                    $shapeParameter['y'] = $attributeValue;
                    break;
                case 'width':
                    $shapeParameter['width'] = $attributeValue;
                    break;
                case 'height':
                    $shapeParameter['height'] = $attributeValue;
                    break;
                default:
                    throw new InvalidShapeParameterException('wrong attribute parameter');
            }
        }
    }

    /**
     * TODO : validation for $shapeParameter structure
     */
    return new \Sample\Shape\Rectangle(
        new \Sample\Shape\Point($shapeParameter['x'], $shapeParameter['y']),
        $shapeParameter['width'],
        $shapeParameter['height']
    );
}
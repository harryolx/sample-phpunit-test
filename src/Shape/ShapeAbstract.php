<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 5/15/18
 * Time: 6:35 PM
 */

namespace Sample\Shape;

use Sample\Exception\InvalidShapeParameterException;

abstract class ShapeAbstract
{
    /**
     * @var Point
     */
    protected $point;

    /**
     * ShapeAbstract constructor.
     * @param Point $point
     * @throws InvalidShapeParameterException
     */
    public function __construct(Point $point)
    {
        $this->point = $point;

        if (!$this->validateParameters()) {
            throw new InvalidShapeParameterException('invalid shape parameters value');
        }
    }

    /**
     * @return int
     */
    final public function getX()
    {
        return $this->point->getX();
    }

    /**
     * @return mixed
     */
    final public function getY()
    {
        return $this->point->getY();
    }

    /**
     * @return bool
     */
    abstract public function validateParameters() : bool ;
}
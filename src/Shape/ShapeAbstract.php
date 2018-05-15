<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 5/15/18
 * Time: 6:35 PM
 */

namespace Sample\Shape;

abstract class ShapeAbstract
{
    /**
     * @var Point
     */
    protected $point;

    /**
     * ShapeAbstract constructor.
     * @param Point $point
     */
    public function __construct(Point $point)
    {
        $this->point = $point;
    }

    /**
     * @return int
     */
    public function getX()
    {
        return $this->point->getX();
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->point->getY();
    }

    /**
     * @return string
     */
    abstract public function output() : string;
}
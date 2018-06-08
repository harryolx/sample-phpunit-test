<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 6/8/18
 * Time: 8:57 AM
 */

namespace Sample\Shape;

class Circle extends ShapeAbstract
{
    const SHAPE_TYPE = 'circle';

    /**
     * @var int
     */
    protected $hDiameter;

    /**
     * Rectangle constructor.
     * @param Point $point
     * @param int $hDiameter
     */
    public function __construct(Point $point, int $hDiameter)
    {
        $this->hDiameter = $hDiameter;
        parent::__construct($point);
    }

    /**
     * @return int
     */
    public function getHDiameter(): int
    {
        return $this->hDiameter;
    }

    /**
     * @return bool
     */
    public function validateParameters() :bool
    {
        /**
         * Cause it will be Point
         */
        return $this->getHDiameter() !== 0;
    }

    public function __toString()
    {
        return sprintf('%s (%d,%d) size=%d', ucfirst(static::SHAPE_TYPE), $this->getX(), $this->getY(), $this->getHDiameter());
    }
}
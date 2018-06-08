<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 6/8/18
 * Time: 8:48 AM
 */

namespace Sample\Shape;

class Square extends ShapeAbstract
{
    const SHAPE_TYPE = 'square';

    /**
     * @var int
     */
    protected $width;

    /**
     * Rectangle constructor.
     * @param Point $point
     * @param int $width
     */
    public function __construct(Point $point, int $width)
    {
        $this->width = $width;
        parent::__construct($point);
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return bool
     */
    public function validateParameters() :bool
    {
        /**
         * cause it will be a Point
         */
        return $this->getWidth() !== 0;
    }

    public function __toString()
    {
        return sprintf('%s (%d,%d) size=%d', ucfirst(static::SHAPE_TYPE), $this->getX(), $this->getY(), $this->getWidth());
    }
}
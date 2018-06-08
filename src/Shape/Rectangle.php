<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 5/15/18
 * Time: 6:30 PM
 */

namespace Sample\Shape;

class Rectangle extends Square
{
    const SHAPE_TYPE = 'rectangle';

    /**
     * @var int
     */
    protected $height;

    /**
     * Rectangle constructor.
     * @param Point $point
     * @param int $width
     * @param int $height
     */
    public function __construct(Point $point, int $width, int  $height)
    {
        $this->height = $height;
        parent::__construct($point, $width);
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @return bool
     */
    public function validateParameters() :bool
    {
        /**
         * cause it will be a square
         */
        return $this->getWidth() !== $this->getHeight();
    }

    public function __toString()
    {
        return sprintf('%s (%d,%d) width=%d height=%d', ucfirst(static::SHAPE_TYPE), $this->getX(), $this->getY(), $this->getWidth(), $this->getHeight());
    }
}
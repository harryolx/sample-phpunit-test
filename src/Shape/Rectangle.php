<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 5/15/18
 * Time: 6:30 PM
 */

namespace Sample\Shape;

class Rectangle extends ShapeAbstract
{
    const SHAPE_TYPE = 'rectangle';

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * Rectangle constructor.
     * @param Point $point
     * @param int $width
     * @param int $height
     */
    public function __construct(Point $point, int $width, int  $height)
    {
        parent::__construct($point);
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @return string
     */
    public function output() : string
    {
        return sprintf('%s (%d,%d) width=%d height=%d', ucfirst(self::SHAPE_TYPE), $this->getX(), $this->getY(), $this->getWidth(), $this->getHeight());
    }

    /**
     * @return Point
     */
    public function getPoint(): Point
    {
        return $this->point;
    }
}
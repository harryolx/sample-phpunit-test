<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 6/8/18
 * Time: 8:51 AM
 */

namespace Sample\Shape;

class Ellipse extends Circle
{
    const SHAPE_TYPE = 'ellipse';

    /**
     * @var int
     */
    private $vDiameter;

    /**
     * Rectangle constructor.
     * @param Point $point
     * @param int $hDiameter
     * @param int $vDiameter
     */
    public function __construct(Point $point, int $hDiameter, int  $vDiameter)
    {
        $this->vDiameter = $vDiameter;
        parent::__construct($point, $hDiameter);
    }

    /**
     * @return int
     */
    public function getVDiameter(): int
    {
        return $this->vDiameter;
    }

    /**
     * @return bool
     */
    public function validateParameters() :bool
    {
        /**
         * cause it will be a circle
         */
        return $this->getHDiameter() !== $this->getVDiameter();
    }

    public function __toString()
    {
        return sprintf('%s (%d,%d) diameterH = %d diameterV = %d', ucfirst(self::SHAPE_TYPE), $this->getX(), $this->getY(), $this->getHDiameter(), $this->getVDiameter());
    }
}
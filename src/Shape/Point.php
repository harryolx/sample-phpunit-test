<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 5/15/18
 * Time: 6:33 PM
 */

namespace Sample\Shape;

class Point
{
    /**
     * @var int
     */
    private $x;

    /**
     * @var
     */
    private $y;

    /**
     * Point constructor.
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }
}
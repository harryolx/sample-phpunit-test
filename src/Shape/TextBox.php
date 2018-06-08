<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 6/8/18
 * Time: 8:58 AM
 */

namespace Sample\Shape;


class TextBox extends Rectangle
{
    const SHAPE_TYPE = 'textBox';

    /**
     * @var string
     */
    private $text;

    public function __construct(Point $point, $width, $height, $text)
    {
        $this->text = $text;
        parent::__construct($point, $width, $height);
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return bool
     */
    public function validateParameters(): bool
    {
        /**
         * cause textbox w & h could have same value
         */
        return true;
    }


    public function __toString()
    {
        return sprintf('%s (%d,%d) width=%d height=%d Text="%s"', ucfirst(self::SHAPE_TYPE), $this->getX(), $this->getY(), $this->getWidth(), $this->getHeight(), $this->getText());
    }
}
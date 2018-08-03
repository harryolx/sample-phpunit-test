<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 8/3/18
 * Time: 5:51 PM
 */

namespace Sample\Tests\unit\helper;


use function helper\CandyCrush\getCount;
use Sample\Tests\unit\Base;

class CandyCrushTest extends Base
{
    public function testCount()
    {
        $this->assertEquals(3, getCount([
            [1,0,1],
            [1,1,1],
            [0,0,0]
        ]));

        $this->assertEquals(3, getCount([
            [1,0,1],
            [1,1,1],
            [0,0,1]
        ]));

        $this->assertEquals(1, getCount([
            [0,0,0],
            [0,0,0],
            [0,0,0]
        ]));

        $this->assertEquals(1, getCount([
            [1,1,1],
            [1,1,1],
            [1,1,1]
        ]));

        $this->assertEquals(2, getCount([
            [1,1,1],
            [1,0,1],
            [1,1,1]
        ]));

        $this->assertEquals(2, getCount([
            [1,1,0],
            [1,1,1],
            [1,1,1]
        ]));
    }
}
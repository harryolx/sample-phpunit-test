<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 5/15/18
 * Time: 8:05 AM
 */

namespace Sample\Tests\unit;

use Mockery\MockInterface;
use Sample\Contract\Discount;
use Sample\Product;

class ProductTest extends Base
{
    public function testGetDiscountedPrice()
    {
        /** @var MockInterface $mockProduct */
        $mockProduct = \Mockery::mock(Discount::class);
        $mockProduct->shouldReceive('getPercentage')->with(1)->andReturn(0.3);
        $mockProduct->shouldReceive('getPercentage')->with(2)->andReturn(0.4);
        $mockProduct->shouldReceive('getPercentage')->with(3)->andReturn(0.5);

        $this->assertEquals(
            70,
            $this->generateProductMock($mockProduct, 1)->getDiscountedPrice()
        );

        $this->assertEquals(
            120,
            $this->generateProductMock($mockProduct, 2)->getDiscountedPrice()
        );

        $this->assertEquals(
            150,
            $this->generateProductMock($mockProduct, 3)->getDiscountedPrice()
        );
    }

    /**
     * @param MockInterface $discountMock
     * @param int $productId
     * @return MockInterface|Product
     */
    private function generateProductMock(MockInterface $discountMock, int $productId) : MockInterface
    {
        $mockProduct = \Mockery::mock(Product::class, [$discountMock, $productId])->makePartial();
        $mockProduct->shouldReceive('getPrice')->with(1)->andReturn(100);
        $mockProduct->shouldReceive('getPrice')->with(2)->andReturn(200);
        $mockProduct->shouldReceive('getPrice')->with(3)->andReturn(300);
        return $mockProduct;
    }
}
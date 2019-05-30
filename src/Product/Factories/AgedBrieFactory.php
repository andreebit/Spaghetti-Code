<?php


namespace App\Product\Factories;


use App\Product\AgedBrie;
use App\Product\Factories\Contracts\ProductFactoryInterface;

/**
 * Class AgedBrieFactory
 * @package App\Product\Factories
 */
class AgedBrieFactory implements ProductFactoryInterface
{

    const NAME = 'Aged Brie';

    /**
     * @param $quality
     * @param $sellIn
     * @return AgedBrie
     */
    public function createProduct($quality, $sellIn)
    {
        return new AgedBrie($quality, $sellIn);
    }

    /**
     * @param $name
     * @return bool
     */
    public function supportProduct($name)
    {
        return $name == self::NAME;
    }

}
<?php


namespace App\Product\Factories;


use App\Product\Backstage;
use App\Product\Factories\Contracts\ProductFactoryInterface;

/**
 * Class BackstageFactory
 * @package App\Product\Factories
 */
class BackstageFactory implements ProductFactoryInterface
{

    const NAME = 'Backstage passes to a TAFKAL80ETC concert';

    /**
     * @param $quality
     * @param $sellIn
     * @return Backstage
     */
    public function createProduct($quality, $sellIn)
    {
        return new Backstage($quality, $sellIn);
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
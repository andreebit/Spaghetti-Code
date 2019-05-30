<?php


namespace App\Product\Factories;


use App\Product\Factories\Contracts\ProductFactoryInterface;
use App\Product\Sulfuras;

/**
 * Class SulfurasFactory
 * @package App\Product\Factories
 */
class SulfurasFactory implements ProductFactoryInterface
{

    const NAME = 'Sulfuras, Hand of Ragnaros';

    /**
     * @param $quality
     * @param $sellIn
     * @return Sulfuras
     */
    public function createProduct($quality, $sellIn)
    {
        return new Sulfuras($quality, $sellIn);
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
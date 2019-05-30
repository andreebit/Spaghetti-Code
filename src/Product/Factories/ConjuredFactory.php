<?php


namespace App\Product\Factories;


use App\Product\Conjured;
use App\Product\Factories\Contracts\ProductFactoryInterface;

/**
 * Class ConjuredFactory
 * @package App\Product\Factories
 */
class ConjuredFactory implements ProductFactoryInterface
{

    const NAME = 'Conjured Mana Cake';

    /**
     * @param $quality
     * @param $sellIn
     * @return Conjured
     */
    public function createProduct($quality, $sellIn)
    {
        return new Conjured($quality, $sellIn);
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
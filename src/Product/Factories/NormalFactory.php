<?php


namespace App\Product\Factories;


use App\Product\Factories\Contracts\ProductFactoryInterface;
use App\Product\Normal;

/**
 * Class NormalFactory
 * @package App\Product\Factories
 */
class NormalFactory implements ProductFactoryInterface
{

    const NAME = 'normal';

    /**
     * @param $quality
     * @param $sellIn
     * @return Normal
     */
    public function createProduct($quality, $sellIn)
    {
        return new Normal($quality, $sellIn);
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
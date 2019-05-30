<?php


namespace App\Product\Factories\Contracts;

/**
 * Interface ProductFactoryInterface
 * @package App\Product\Factories\Contracts
 */
interface ProductFactoryInterface
{

    public function createProduct($quality, $sellIn);

    public function supportProduct($name);

}
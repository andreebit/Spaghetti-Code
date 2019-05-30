<?php


namespace App\Product;


use App\Product\Contracts\ProductHasQualityInterface;
use App\Product\Contracts\ProductIsSoldInterface;
use App\Product\Contracts\ProductIsTickedInterface;

/**
 * Class Conjured
 * @package App\Product
 */
class Conjured extends AbstractProduct implements ProductHasQualityInterface, ProductIsSoldInterface, ProductIsTickedInterface
{

    /**
     * Updates the product's quality
     * @throws \Exception
     */
    public function updateQuality()
    {

        $qualityToDecrease = 2;

        if ($this->getSellIn() <= 0)
        {
            $qualityToDecrease = 4;
        }

        $this->setQuality($this->getQuality() - $qualityToDecrease);
    }

    /**
     * Updates the product's sellIn
     */
    public function updateSellIn()
    {
        $this->setSellIn($this->getSellIn() - 1);
    }

    /**
     * Makes tick
     */
    public function tick()
    {
        $this->updateSellIn();
        $this->updateQuality();
    }

}
<?php


namespace App\Product;


use App\Product\Contracts\ProductHasQualityInterface;
use App\Product\Contracts\ProductIsSoldInterface;
use App\Product\Contracts\ProductIsTickedInterface;

/**
 * Class AgedBrie
 * @package App\Product
 */
class AgedBrie extends AbstractProduct implements ProductHasQualityInterface, ProductIsSoldInterface, ProductIsTickedInterface
{

    /**
     * Updates the product's quality
     */
    public function updateQuality()
    {
        $qualityToIncrease = 1;

        if ($this->getSellIn() <= 0) {
            $qualityToIncrease = 2;
        }

        $this->setQuality($this->getQuality() + $qualityToIncrease);
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
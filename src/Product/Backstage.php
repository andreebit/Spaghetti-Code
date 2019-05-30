<?php


namespace App\Product;


use App\Product\Contracts\ProductHasQualityInterface;
use App\Product\Contracts\ProductIsSoldInterface;
use App\Product\Contracts\ProductIsTickedInterface;

/**
 * Class Backstage
 * @package App\Product
 */
class Backstage extends AbstractProduct implements ProductHasQualityInterface, ProductIsSoldInterface, ProductIsTickedInterface
{

    /**
     * Quality increases by 2 when there are 10 days or less
     */
    const FIRST_DAYS_RANGE = 10;

    /**
     * Quality increases by 3 when there are 5 days or less
     */
    const SECOND_DAYS_RANGE = 5;

    /**
     * Updates the product's quality
     */
    public function updateQuality()
    {
        if ($this->getSellIn() < 0) {
            $this->setQuality(0);
        } else {

            $qualityToIncrease = 1;

            if ($this->getSellIn() < self::SECOND_DAYS_RANGE) {
                $qualityToIncrease = 3;
            } elseif ($this->getSellIn() < self::FIRST_DAYS_RANGE) {
                $qualityToIncrease = 2;
            }

            $this->setQuality($this->getQuality() + $qualityToIncrease);
        }
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
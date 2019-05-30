<?php


namespace App\Product;

/**
 * Class AbstractProduct
 * @package App\Product
 */
abstract class AbstractProduct
{

    /**
     * The Quality of an item is never more than 50
     */
    const MAX_QUALITY = 50;

    /**
     * The Quality of an item is never negative
     */
    const MIN_QUALITY = 0;

    /**
     * @var int
     */
    public $sellIn;

    /**
     * @var int
     */
    public $quality;

    /**
     * Product constructor.
     * @param $quality
     * @param $sellIn
     */
    public function __construct($quality, $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    /**
     * @return mixed
     */
    public function getSellIn()
    {
        return $this->sellIn;
    }

    /**
     * @param mixed $sellIn
     */
    public function setSellIn($sellIn)
    {
        $this->sellIn = $sellIn;
    }

    /**
     * @return mixed
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * @param $quality
     */
    public function setQuality($quality)
    {
        if ($quality < self::MIN_QUALITY) {
            $quality = self::MIN_QUALITY;
        }

        if ($quality > self::MAX_QUALITY) {
            $quality = self::MAX_QUALITY;
        }

        $this->quality = $quality;
    }



}
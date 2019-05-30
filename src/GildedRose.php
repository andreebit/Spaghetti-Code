<?php

namespace App;

use App\Product\Contracts\ProductIsTickedInterface;
use App\Product\Factories\AgedBrieFactory;
use App\Product\Factories\BackstageFactory;
use App\Product\Factories\ConjuredFactory;
use App\Product\Factories\Contracts\ProductFactoryInterface;
use App\Product\Factories\NormalFactory;
use App\Product\Factories\SulfurasFactory;

/**
 * Class GildedRose
 * @package App
 */
class GildedRose
{

    /**
     * @var array
     */
    private static $factories = [];

    /**
     * @var ProductIsTickedInterface
     */
    private static $productItem;

    /**
     * GildedRose constructor.
     * @param $name
     * @param $quality
     * @param $sellIn
     * @throws \Exception
     */
    public function __construct($name, $quality, $sellIn)
    {
        return self::of($name, $quality, $sellIn);
    }

    /**
     * @param $name
     * @param $quality
     * @param $sellIn
     * @return ProductIsTickedInterface
     * @throws \Exception
     */
    public static function of($name, $quality, $sellIn)
    {

        /**
         * El uso común y popular de los factories, con una clase que maneja un switch por ejemplo, rompe el
         * principio de abierto y cerrado y SOLID, ya que se tiene que entrar a modificar la clase y el switch cada vez
         * que se quiere agregar un nuevo tipo.
         *
         * Para evitar eso, implementé el factory de esta manera.
         *
         * Entonces, cada vez que se desee agregar un nuevo tipo de producto, solo se lo debe asociar a un factory
         * y agregarlo al arreglo que está dentro de la clase principal y que, por su naturaleza, sí está abierta
         * a modificación.
         */

        self::$factories = [
            new AgedBrieFactory(),
            new BackstageFactory(),
            new ConjuredFactory(),
            new NormalFactory(),
            new SulfurasFactory()
        ];

        foreach (self::$factories as $factory) {
            if ($factory instanceof ProductFactoryInterface && $factory->supportProduct($name)) {
                self::$productItem = $factory->createProduct($quality, $sellIn);
                return self::$productItem;
            }
        }

        throw new \Exception('No se encontró el producto: ' . $name);
    }

    /**
     * Makes tick
     */
    public function tick()
    {
        self::$productItem->tick();
    }
}

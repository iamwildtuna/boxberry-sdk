<?php

namespace WildTuna\BoxberrySdk\Entity;

class Place
{
    /**
     * Вес в граммах (Минимальное значение 5 г, максимальное – 30000 г.)
     * @var int
     */
    private $weight = 5;

    /**
     * Штрих-код места
     * @var string
     */
    private $barcode = '';

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * @param string $barcode
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
    }
}
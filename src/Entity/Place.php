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
    private $barcode = null;

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     */
    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getBarcode(): string
    {
        return $this->barcode;
    }

    /**
     * @param string $barcode
     */
    public function setBarcode(string $barcode): void
    {
        $this->barcode = $barcode;
    }
}
<?php

namespace WildTuna\BoxberrySdk\Entity;

class Place
{
    /**
     * Вес в граммах (Минимальное значение 5 г, максимальное – 31000 г.)
     * @var int
     */
    private $weight = 5;

    /**
     * Штрих-код места
     * @var string
     */
    private $barcode = '';
    
    /**
    * Длина
    * @var float
    */
    private $x;
    
    /**
    * Ширина
    * @var float
    */
    private $y;
    
    /**
    * Высота
    * @var float
    */
    private $z;

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
        /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param mixed $x
     */
    public function setX($x): void
    {
        $this->x = $x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param mixed $y
     */
    public function setY($y): void
    {
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function getZ()
    {
        return $this->z;
    }

    /**
     * @param mixed $z
     */
    public function setZ($z): void
    {
        $this->z = $z;
    }
}

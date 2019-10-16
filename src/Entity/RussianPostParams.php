<?php

namespace WildTuna\BoxberrySdk\Entity;

class RussianPostParams
{
    // Типы отправлений (PT_*)
    const PT_POSILKA = 0;
    const PT_COURIER_ONLINE = 2;
    const PT_POSILKA_ONLINE = 3;
    const PT_POSILKA_ONE_CLASS = 5;

    // Типы упаковки
    const PACKAGE_IM_SMALLER_160 = 0;
    const PACKAGE_IM_MORE_160 = 1;
    const PACKAGE_BB_SMALLER_160 = 2;
    const PACKAGE_BB_MORE_160 = 3;

    /**
     * Тип отправления
     * @var int
     */
    private $type = null;

    /**
     * Хрупкая посылка
     * @var bool
     */
    private $fragile = false;

    /**
     * Строгий тип
     * @var bool
     */
    private $strong = false;

    /**
     * Оптимизация тарифа
     * @var bool
     */
    private $optimize = false;

    /**
     * Тип упаковки
     * @var int
     */
    private $packing_type = null;

    /**
     * Длина в см
     * @var null
     */
    private $length = null;

    /**
     * Ширина в см
     * @var null
     */
    private $width = null;

    /**
     * Высота в см
     * @var null
     */
    private $height = null;

    /**
     * Строгая упаковка
     * @var bool
     */
    private $packing_strict = false;

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function isFragile()
    {
        return $this->fragile;
    }

    /**
     * @param bool $fragile
     */
    public function setFragile($fragile)
    {
        $this->fragile = $fragile;
    }

    /**
     * @return bool
     */
    public function isStrong()
    {
        return $this->strong;
    }

    /**
     * @param bool $strong
     */
    public function setStrong($strong)
    {
        $this->strong = $strong;
    }

    /**
     * @return bool
     */
    public function isOptimize()
    {
        return $this->optimize;
    }

    /**
     * @param bool $optimize
     */
    public function setOptimize($optimize)
    {
        $this->optimize = $optimize;
    }

    /**
     * @return int
     */
    public function getPackingType()
    {
        return $this->packing_type;
    }

    /**
     * @param int $packing_type
     */
    public function setPackingType($packing_type)
    {
        $this->packing_type = $packing_type;
    }

    /**
     * @return bool
     */
    public function isPackingStrict()
    {
        return $this->packing_strict;
    }

    /**
     * @param bool $packing_strict
     */
    public function setPackingStrict($packing_strict)
    {
        $this->packing_strict = $packing_strict;
    }

    /**
     * @return null
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param null $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return null
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param null $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return null
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param null $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }
}
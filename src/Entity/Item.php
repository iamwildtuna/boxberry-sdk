<?php
namespace WildTuna\BoxberrySdk\Entity;

class Item
{
    /**
     * ID товара
     * @var int
     */
    private $id = 1;

    /**
     * Наименование товара
     * @var string
     */
    private $name = null;

    /**
     * Единица измерения
     * @var string
     */
    private $unit = 'шт';

    /**
     * Ставка НДС в %
     * @var int
     */
    private $vat = 20;

    /**
     * Стоимость
     * @var int
     */
    private $amount = 0;

    /**
     * Количество
     * @var int
     */
    private $quantity = 0;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param string $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    /**
     * @return int
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @param int $vat
     */
    public function setVat($vat)
    {
        $this->vat = $vat;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}
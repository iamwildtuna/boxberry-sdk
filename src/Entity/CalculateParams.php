<?php

namespace WildTuna\BoxberrySdk\Entity;

class CalculateParams
{
    /**
     * Вес заказа в граммах
     * @var int
     */
    private $weight = null;

    /**
     * Код ПВЗ
     * @var int
     */
    private $pvz = null;

    /**
     * Стоимость заказа
     * @var float
     */
    private $amount = null;

    /**
     * Сумма к оплате
     * @var float
     */
    private $payment_amount = null;

    /**
     * Стоимость доставки
     * @var float
     */
    private $delivery_amount = null;

    /**
     * Код пункта  приема посылок
     * @var int
     */
    private $target_start = null;

    /**
     * Высота коробки в сантиметрах
     * @var float
     */
    private $height = null;

    /**
     * Ширина коробки в сантиметрах
     * @var float
     */
    private $width = null;

    /**
     * Глубина коробки в сантиметрах
     * @var float
     */
    private $depth = null;

    /**
     * Почтовый индекс города для курьерской доставки
     * @var int
     */
    private $zip = null;

    /**
     * Параметр добавляется к DeliveryCosts, позволяет получать расчеты с учетом наценок установленных в ЛК - Настройки средств интеграции (sucrh=1)
     * @var bool
     */
    private $suchr = false;

    public function asArr()
    {
        $params['weight'] = $this->weight;
        $params['ordersum'] = $this->amount;
        $params['deliverysum'] = $this->delivery_amount;
        $params['paysum'] = $this->payment_amount;
        $params['targetstart'] = $this->target_start;
        $params['height'] = $this->height;
        $params['width'] = $this->width;
        $params['depth'] = $this->depth;
        if ($this->suchr)
            $params['sucrh'] = $this->suchr;

        if (!empty($this->pvz)) {
            $params['target'] = $this->getPvz();
        } else {
            $params['zip'] = $this->getZip();
        }

        return $params;
    }

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
     * @return int
     */
    public function getPvz()
    {
        return $this->pvz;
    }

    /**
     * @param int $pvz
     */
    public function setPvz($pvz)
    {
        $this->pvz = $pvz;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return float
     */
    public function getPaymentAmount()
    {
        return $this->payment_amount;
    }

    /**
     * @param float $payment_amount
     */
    public function setPaymentAmount($payment_amount)
    {
        $this->payment_amount = $payment_amount;
    }

    /**
     * @return float
     */
    public function getDeliveryAmount()
    {
        return $this->delivery_amount;
    }

    /**
     * @param float $delivery_amount
     */
    public function setDeliveryAmount($delivery_amount)
    {
        $this->delivery_amount = $delivery_amount;
    }

    /**
     * @return int
     */
    public function getTargetStart()
    {
        return $this->target_start;
    }

    /**
     * @param int $target_start
     */
    public function setTargetStart($target_start)
    {
        $this->target_start = $target_start;
    }

    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param float $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * @param float $depth
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;
    }

    /**
     * @return int
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param int $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return bool
     */
    public function isSuchr()
    {
        return $this->suchr;
    }

    /**
     * @param bool $suchr
     */
    public function setSuchr($suchr)
    {
        $this->suchr = $suchr;
    }
}
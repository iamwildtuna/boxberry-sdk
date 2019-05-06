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
     * @return int
     */
    public function getPvz(): int
    {
        return $this->pvz;
    }

    /**
     * @param int $pvz
     */
    public function setPvz(int $pvz): void
    {
        $this->pvz = $pvz;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return float
     */
    public function getPaymentAmount(): float
    {
        return $this->payment_amount;
    }

    /**
     * @param float $payment_amount
     */
    public function setPaymentAmount(float $payment_amount): void
    {
        $this->payment_amount = $payment_amount;
    }

    /**
     * @return float
     */
    public function getDeliveryAmount(): float
    {
        return $this->delivery_amount;
    }

    /**
     * @param float $delivery_amount
     */
    public function setDeliveryAmount(float $delivery_amount): void
    {
        $this->delivery_amount = $delivery_amount;
    }

    /**
     * @return int
     */
    public function getTargetStart(): int
    {
        return $this->target_start;
    }

    /**
     * @param int $target_start
     */
    public function setTargetStart(int $target_start): void
    {
        $this->target_start = $target_start;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight(float $height): void
    {
        $this->height = $height;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @param float $width
     */
    public function setWidth(float $width): void
    {
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getDepth(): float
    {
        return $this->depth;
    }

    /**
     * @param float $depth
     */
    public function setDepth(float $depth): void
    {
        $this->depth = $depth;
    }

    /**
     * @return int
     */
    public function getZip(): int
    {
        return $this->zip;
    }

    /**
     * @param int $zip
     */
    public function setZip(int $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return bool
     */
    public function isSuchr(): bool
    {
        return $this->suchr;
    }

    /**
     * @param bool $suchr
     */
    public function setSuchr(bool $suchr): void
    {
        $this->suchr = $suchr;
    }
}
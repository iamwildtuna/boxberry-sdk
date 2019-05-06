<?php
namespace WildTuna\BoxberrySdk\Entity;

class TariffInfo
{
    /**
     * @var float
     */
    private $price = null;

    /**
     * @var float
     */
    private $price_base = null;

    /**
     * @var float
     */
    private $price_service = null;

    /**
     * @var string
     */
    private $delivery_period = null;

    /**
     * TariffInfo constructor.
     *
     * @param null|array $response
     */
    public function __construct($response = null)
    {
        if ($response) {
            $this->setPrice($response['price']);
            $this->setPriceBase($response['price_base']);
            $this->setPriceService($response['price_service']);
            $this->setDeliveryPeriod($response['delivery_period']);
        }
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getPriceBase(): float
    {
        return $this->price_base;
    }

    /**
     * @param float $price_base
     */
    public function setPriceBase(float $price_base): void
    {
        $this->price_base = $price_base;
    }

    /**
     * @return float
     */
    public function getPriceService(): float
    {
        return $this->price_service;
    }

    /**
     * @param float $price_service
     */
    public function setPriceService(float $price_service): void
    {
        $this->price_service = $price_service;
    }

    /**
     * @return string
     */
    public function getDeliveryPeriod(): string
    {
        return $this->delivery_period;
    }

    /**
     * @param string $delivery_period
     */
    public function setDeliveryPeriod(string $delivery_period): void
    {
        $this->delivery_period = $delivery_period;
    }


}
<?php
namespace WildTuna\BoxberrySdk\Entity;

class Order
{
    /**
     * Трекинг-код ранее созданной посылки
     * @var string
     */
    private $track_num = null;

    /**
     * ID заказа в ИМ
     * @var string
     */
    private $order_id = null;

    /**
     * Номер паллета
     * @var int
     */
    private $pallet_num = 0;

    /**
     * Штрих-код заказа
     * @var string
     */
    private $barcode = null;

    /**
     * Объявленная стоимость (price)
     * @var float
     */
    private $valuated_amount = 0;

    /**
     * Сумма к оплате (payment_sum)
     * @var float
     */
    private $payment_amount = 0;

    /**
     * Стоимость доставки (delivery_sum)
     * @var float
     */
    private $delivery_amount = 0;

    /**
     * Вид доставки (1/2)
     * 1 – самовывоз (доставка до ПВЗ)
     * 2 – курьерская доставка (экспресс-доставка до получателя)
     * @var int
     */
    private $vid = 1;

    /**
     * Код ПВЗ (shop_name)
     * @var string
     */
    private $pvz_code = null;

    /**
     * Код пункта поступления (shop_name1)
     * @var string
     */
    private $point_of_entry = null;

    /**
     * Получатель
     *
     * @var Customer
     */
    private $customer = null;

    /**
     * Массив товаров в заказе
     *
     * @var array
     */
    private $items = [];

    /**
     * Места в заказе (коробки)
     * @var array
     */
    private $places = [];

    /**
     * Комментарий
     * @var string
     */
    private $comment = '';

    /**
     * @return string
     */
    public function getTrackNum(): string
    {
        return $this->track_num;
    }

    /**
     * @param string $track_num
     */
    public function setTrackNum(string $track_num): void
    {
        $this->track_num = $track_num;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->order_id;
    }

    /**
     * @param string $order_id
     */
    public function setOrderId(string $order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @return int
     */
    public function getPalletNum(): int
    {
        return $this->pallet_num;
    }

    /**
     * @param int $pallet_num
     */
    public function setPalletNum(int $pallet_num): void
    {
        $this->pallet_num = $pallet_num;
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

    /**
     * @return float
     */
    public function getValuatedAmount(): float
    {
        return $this->valuated_amount;
    }

    /**
     * @param float $valuated_amount
     */
    public function setValuatedAmount(float $valuated_amount): void
    {
        $this->valuated_amount = $valuated_amount;
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
    public function getVid(): int
    {
        return $this->vid;
    }

    /**
     * @param int $vid
     */
    public function setVid(int $vid): void
    {
        $this->vid = $vid;
    }

    /**
     * @return string
     */
    public function getPvzCode(): string
    {
        return $this->pvz_code;
    }

    /**
     * @param string $pvz_code
     */
    public function setPvzCode(string $pvz_code): void
    {
        $this->pvz_code = $pvz_code;
    }

    /**
     * @return string
     */
    public function getPointOfEntry(): string
    {
        return $this->point_of_entry;
    }

    /**
     * @param string $point_of_entry
     */
    public function setPointOfEntry(string $point_of_entry): void
    {
        $this->point_of_entry = $point_of_entry;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Item $item
     */
    public function setItems(Item $item): void
    {
        $this->items[] = $item;
    }

    /**
     * @return array
     */
    public function getPlaces(): array
    {
        return $this->places;
    }

    /**
     * @param Place $place
     */
    public function setPlaces(Place $place): void
    {
        $this->places[] = $place;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }
}
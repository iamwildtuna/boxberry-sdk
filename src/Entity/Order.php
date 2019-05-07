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
     * Дата доставки
     * @var string
     */
    private $delivery_date = '';

    /**
     * Комментарий
     * @var string
     */
    private $comment = '';

    public function asArr()
    {
        $params = [];
        $params['updateByTrack'] = $this->track_num;
        $params['order_id'] = $this->order_id;
        $params['PalletNumber'] = $this->pallet_num;
        $params['barcode'] = $this->barcode;
        $params['price'] = $this->valuated_amount;
        $params['payment_sum'] = $this->payment_amount;
        $params['delivery_sum'] = $this->delivery_amount;
        $params['vid'] = $this->vid;
        $params['shop']['name'] = $this->pvz_code;
        $params['shop']['name1'] = $this->point_of_entry;

        $customer = [];
        $customer['fio'] = $this->customer->getFio();
        $customer['phone'] = $this->customer->getPhone();
        $customer['phone2'] = $this->customer->getSecondPhone();
        $customer['email'] = $this->customer->getEmail();
        $customer['name'] = $this->customer->getOrgName();
        $customer['address'] = $this->customer->getOrgAddress();
        $customer['inn'] = $this->customer->getOrgInn();
        $customer['kpp'] = $this->customer->getOrgKpp();
        $customer['r_s'] = $this->customer->getOrgRs();
        $customer['bank'] = $this->customer->getOrgBankName();
        $customer['kor_s'] = $this->customer->getOrgKs();
        $customer['bik'] = $this->customer->getOrgBankBik();
        $params['customer'] = $customer;

        $kurdost = [];
        $kurdost['index'] = $this->customer->getIndex();
        $kurdost['citi'] = $this->customer->getCity();
        $kurdost['addressp'] = $this->customer->getAddress();
        $kurdost['timesfrom1'] = $this->customer->getTimeFrom();
        $kurdost['timesto1'] = $this->customer->getTimeTo();
        $kurdost['timesfrom2'] = $this->customer->getTimeFromSecond();
        $kurdost['timesto2'] = $this->customer->getTimeToSecond();
        $kurdost['timep'] = $this->customer->getDeliveryTime();
        $kurdost['delivery_date'] = $this->delivery_date;
        $kurdost['comentk'] = $this->comment;
        $params['kurdost'] = $kurdost;


        if (empty($this->places))
            throw new \InvalidArgumentException('В заказе не заполнена информация о местах!');

        if (count($this->places) > 5)
            throw new \InvalidArgumentException('В заказе не может быть больше 5 мест!');

        $weights = [];
        /**
         * @var Place $place
         */
        foreach ($this->places as $num => $place) {
            $num++;

            if ($num === 1) {
                $num = '';
            }

            $weights['weight'.$num] = $place->getWeight();
            $weights['barcode'.$num] = $place->getBarcode();
        }
        $params['weights'] = $weights;

        if (empty($this->items))
            throw new \InvalidArgumentException('В заказе не заполнены товары!');

        $items = [];
        /**
         * @var Item $item
         */
        foreach ($this->items as $num => $item) {
            $bbItem['id'] = $item->getId();
            $bbItem['name'] = $item->getName();
            $bbItem['UnitName'] = $item->getUnit();
            $bbItem['nds'] = $item->getVat();
            $bbItem['price'] = $item->getAmount();
            $bbItem['quantity'] = $item->getQuantity();
            $items[] = $bbItem;
        }

        $params['items'] = $items;

        return $params;
    }

    /**
     * @return string
     */
    public function getTrackNum()
    {
        return $this->track_num;
    }

    /**
     * @param string $track_num
     */
    public function setTrackNum($track_num)
    {
        $this->track_num = $track_num;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param string $order_id
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @return int
     */
    public function getPalletNum()
    {
        return $this->pallet_num;
    }

    /**
     * @param int $pallet_num
     */
    public function setPalletNum($pallet_num)
    {
        $this->pallet_num = $pallet_num;
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
     * @return float
     */
    public function getValuatedAmount()
    {
        return $this->valuated_amount;
    }

    /**
     * @param float $valuated_amount
     */
    public function setValuatedAmount($valuated_amount)
    {
        $this->valuated_amount = $valuated_amount;
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
    public function getVid()
    {
        return $this->vid;
    }

    /**
     * @param int $vid
     */
    public function setVid($vid)
    {
        $this->vid = $vid;
    }

    /**
     * @return string
     */
    public function getPvzCode()
    {
        return $this->pvz_code;
    }

    /**
     * @param string $pvz_code
     */
    public function setPvzCode($pvz_code)
    {
        $this->pvz_code = $pvz_code;
    }

    /**
     * @return string
     */
    public function getPointOfEntry()
    {
        return $this->point_of_entry;
    }

    /**
     * @param string $point_of_entry
     */
    public function setPointOfEntry($point_of_entry)
    {
        $this->point_of_entry = $point_of_entry;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Item $item
     */
    public function setItems($item)
    {
        $this->items[] = $item;
    }

    /**
     * @return array
     */
    public function getPlaces()
    {
        return $this->places;
    }

    /**
     * @param Place $place
     */
    public function setPlaces($place)
    {
        $this->places[] = $place;
    }

    /**
     * @return string
     */
    public function getDeliveryDate()
    {
        return $this->delivery_date;
    }

    /**
     * @param string $delivery_date
     */
    public function setDeliveryDate($delivery_date)
    {
        $this->delivery_date = $delivery_date;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
}
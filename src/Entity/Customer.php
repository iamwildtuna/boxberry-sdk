<?php
namespace WildTuna\BoxberrySdk\Entity;

class Customer
{
    /**
     * ФИО
     * @var string
     */
    private $fio = null;

    /**
     * Телефон
     * @var string
     */
    private $phone = null;

    /**
     * Дополнительный телефон
     * @var string
     */
    private $second_phone = null;

    /**
     * Email
     * @var string
     */
    private $email = null;

    /**
     * Наименование организации
     * @var string
     */
    private $org_name = null;

    /**
     * Адрес организации
     * @var string
     */
    private $org_address = null;

    /**
     * ИНН
     * @var string
     */
    private $org_inn = null;

    /**
     * КПП
     * @var string
     */
    private $org_kpp = null;

    /**
     * Расчетный счет
     * @var string
     */
    private $org_rs = null;

    /**
     * Кор. счет
     * @var string
     */
    private $org_ks = null;

    /**
     * БИК банка
     * @var int
     */
    private $org_bank_bik = null;

    /**
     * Наименование банка
     * @var string
     */
    private $org_bank_name = null;

    /**
     * Почтовый индекс доставки
     * @var int
     */
    private $index = null;

    /**
     * Город доставки
     * @var string
     */
    private $city = null;

    /**
     * Адрес доставки
     * @var string
     */
    private $address = null;

    /**
     * Время доставки от
     * @var string
     */
    private $time_from = null;

    /**
     * Время доставки до
     * @var string
     */
    private $time_to = null;

    /**
     * Время доставки от альтернативное
     * @var string
     */
    private $time_from_second = null;

    /**
     * Время доставки до альтернативное
     * @var string
     */
    private $time_to_second = null;

    /**
     * Время доставки в свободной форме
     * @var string
     */
    private $delivery_time = null;

    /**
     * @return string
     */
    public function getFio()
    {
        return $this->fio;
    }

    /**
     * @param string $fio
     */
    public function setFio($fio)
    {
        $this->fio = $fio;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getSecondPhone()
    {
        return $this->second_phone;
    }

    /**
     * @param string $second_phone
     */
    public function setSecondPhone($second_phone)
    {
        $this->second_phone = $second_phone;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getOrgName()
    {
        return $this->org_name;
    }

    /**
     * @param string $org_name
     */
    public function setOrgName($org_name)
    {
        $this->org_name = $org_name;
    }

    /**
     * @return string
     */
    public function getOrgAddress()
    {
        return $this->org_address;
    }

    /**
     * @param string $org_address
     */
    public function setOrgAddress($org_address)
    {
        $this->org_address = $org_address;
    }

    /**
     * @return string
     */
    public function getOrgInn()
    {
        return $this->org_inn;
    }

    /**
     * @param string $org_inn
     */
    public function setOrgInn($org_inn)
    {
        $this->org_inn = $org_inn;
    }

    /**
     * @return string
     */
    public function getOrgKpp()
    {
        return $this->org_kpp;
    }

    /**
     * @param string $org_kpp
     */
    public function setOrgKpp($org_kpp)
    {
        $this->org_kpp = $org_kpp;
    }

    /**
     * @return string
     */
    public function getOrgRs()
    {
        return $this->org_rs;
    }

    /**
     * @param string $org_rs
     */
    public function setOrgRs($org_rs)
    {
        $this->org_rs = $org_rs;
    }

    /**
     * @return string
     */
    public function getOrgKs()
    {
        return $this->org_ks;
    }

    /**
     * @param string $org_ks
     */
    public function setOrgKs($org_ks)
    {
        $this->org_ks = $org_ks;
    }

    /**
     * @return int
     */
    public function getOrgBankBik()
    {
        return $this->org_bank_bik;
    }

    /**
     * @param int $org_bik
     */
    public function setOrgBankBik($org_bank_bik)
    {
        $this->org_bank_bik = $org_bank_bik;
    }

    /**
     * @return string
     */
    public function getOrgBankName()
    {
        return $this->org_bank_name;
    }

    /**
     * @param string $org_bank_name
     */
    public function setOrgBankName($org_bank_name)
    {
        $this->org_bank_name = $org_bank_name;
    }

    /**
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param int $index
     */
    public function setIndex($index)
    {
        $this->index = $index;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getTimeFrom()
    {
        return $this->time_from;
    }

    /**
     * @param string $time_from
     */
    public function setTimeFrom($time_from)
    {
        $this->time_from = $time_from;
    }

    /**
     * @return string
     */
    public function getTimeTo()
    {
        return $this->time_to;
    }

    /**
     * @param string $time_to
     */
    public function setTimeTo($time_to)
    {
        $this->time_to = $time_to;
    }

    /**
     * @return string
     */
    public function getTimeFromSecond()
    {
        return $this->time_from_second;
    }

    /**
     * @param string $time_from_second
     */
    public function setTimeFromSecond($time_from_second)
    {
        $this->time_from_second = $time_from_second;
    }

    /**
     * @return string
     */
    public function getTimeToSecond()
    {
        return $this->time_to_second;
    }

    /**
     * @param string $time_to_second
     */
    public function setTimeToSecond($time_to_second)
    {
        $this->time_to_second = $time_to_second;
    }

    /**
     * @return string
     */
    public function getDeliveryTime()
    {
        return $this->delivery_time;
    }

    /**
     * @param string $delivery_time
     */
    public function setDeliveryTime($delivery_time)
    {
        $this->delivery_time = $delivery_time;
    }
}
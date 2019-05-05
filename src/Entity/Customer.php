<?php
namespace WildTuna\BoxberrySdk;

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
    private $org_bik = null;

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
    public function getFio(): string
    {
        return $this->fio;
    }

    /**
     * @param string $fio
     */
    public function setFio(string $fio): void
    {
        $this->fio = $fio;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getSecondPhone(): string
    {
        return $this->second_phone;
    }

    /**
     * @param string $second_phone
     */
    public function setSecondPhone(string $second_phone): void
    {
        $this->second_phone = $second_phone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getOrgName(): string
    {
        return $this->org_name;
    }

    /**
     * @param string $org_name
     */
    public function setOrgName(string $org_name): void
    {
        $this->org_name = $org_name;
    }

    /**
     * @return string
     */
    public function getOrgAddress(): string
    {
        return $this->org_address;
    }

    /**
     * @param string $org_address
     */
    public function setOrgAddress(string $org_address): void
    {
        $this->org_address = $org_address;
    }

    /**
     * @return string
     */
    public function getOrgInn(): string
    {
        return $this->org_inn;
    }

    /**
     * @param string $org_inn
     */
    public function setOrgInn(string $org_inn): void
    {
        $this->org_inn = $org_inn;
    }

    /**
     * @return string
     */
    public function getOrgKpp(): string
    {
        return $this->org_kpp;
    }

    /**
     * @param string $org_kpp
     */
    public function setOrgKpp(string $org_kpp): void
    {
        $this->org_kpp = $org_kpp;
    }

    /**
     * @return string
     */
    public function getOrgRs(): string
    {
        return $this->org_rs;
    }

    /**
     * @param string $org_rs
     */
    public function setOrgRs(string $org_rs): void
    {
        $this->org_rs = $org_rs;
    }

    /**
     * @return string
     */
    public function getOrgKs(): string
    {
        return $this->org_ks;
    }

    /**
     * @param string $org_ks
     */
    public function setOrgKs(string $org_ks): void
    {
        $this->org_ks = $org_ks;
    }

    /**
     * @return int
     */
    public function getOrgBik(): int
    {
        return $this->org_bik;
    }

    /**
     * @param int $org_bik
     */
    public function setOrgBik(int $org_bik): void
    {
        $this->org_bik = $org_bik;
    }

    /**
     * @return string
     */
    public function getOrgBankName(): string
    {
        return $this->org_bank_name;
    }

    /**
     * @param string $org_bank_name
     */
    public function setOrgBankName(string $org_bank_name): void
    {
        $this->org_bank_name = $org_bank_name;
    }

    /**
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * @param int $index
     */
    public function setIndex(int $index): void
    {
        $this->index = $index;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getTimeFrom(): string
    {
        return $this->time_from;
    }

    /**
     * @param string $time_from
     */
    public function setTimeFrom(string $time_from): void
    {
        $this->time_from = $time_from;
    }

    /**
     * @return string
     */
    public function getTimeTo(): string
    {
        return $this->time_to;
    }

    /**
     * @param string $time_to
     */
    public function setTimeTo(string $time_to): void
    {
        $this->time_to = $time_to;
    }

    /**
     * @return string
     */
    public function getTimeFromSecond(): string
    {
        return $this->time_from_second;
    }

    /**
     * @param string $time_from_second
     */
    public function setTimeFromSecond(string $time_from_second): void
    {
        $this->time_from_second = $time_from_second;
    }

    /**
     * @return string
     */
    public function getTimeToSecond(): string
    {
        return $this->time_to_second;
    }

    /**
     * @param string $time_to_second
     */
    public function setTimeToSecond(string $time_to_second): void
    {
        $this->time_to_second = $time_to_second;
    }

    /**
     * @return string
     */
    public function getDeliveryTime(): string
    {
        return $this->delivery_time;
    }

    /**
     * @param string $delivery_time
     */
    public function setDeliveryTime(string $delivery_time): void
    {
        $this->delivery_time = $delivery_time;
    }
}
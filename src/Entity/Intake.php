<?php

namespace WildTuna\BoxberrySdk\Entity;

class Intake
{
    /**
     * Почтовый индекс
     * @var int
     */
    private $zip = null;

    /**
     * Город
     * @var string
     */
    private $city = null;

    /**
     * Улица
     * @var string
     */
    private $street = null;

    /**
     * Дом
     * @var string
     */
    private $house = null;

    /**
     * Строение
     * @var string
     */
    private $building = null;

    /**
     * Корпус
     * @var string
     */
    private $corpus = null;

    /**
     * Квартира
     * @var string
     */
    private $flat = null;

    /**
     * Контактное лицо
     * @var string
     */
    private $contact_person = null;

    /**
     * Контактный телефон
     * @var string
     */
    private $contact_phone = null;

    /**
     * Дата забора
     * @var string
     */
    private $taking_date = null;

    /**
     * Время забора с
     * @var string
     */
    private $taking_time_from = '10:00';

    /**
     * Время забора по
     * @var string
     */
    private $taking_time_to = '18:00';

    /**
     * Количество мест
     * @var int
     */
    private $places = 1;

    /**
     * Объем в м3
     * @var float
     */
    private $volume = 0.5;

    /**
     * Вес в кг
     * @var float
     */
    private $weight = 1;

    /**
     * Комментарий
     * @var string
     */
    private $comment = null;

    /**
     * Формирует массив параметров для запроса
     *
     * @return array
     */
    public function asArr()
    {
        $params = [];
        $params['zip'] = $this->zip;
        $params['city'] = $this->city;
        $params['street'] = $this->street;
        $params['house'] = $this->house;
        $params['building'] = $this->corpus;
        $params['housing'] = $this->building;
        $params['flat'] = $this->flat;
        $params['contact_person'] = $this->contact_person;
        $params['contact_phone'] = $this->contact_phone;
        $params['taking_date'] = date('d.m.Y', strtotime($this->taking_date));
        $params['taking_time_from'] = $this->taking_time_from;
        $params['taking_time_to'] = $this->taking_time_to;
        $params['seats_count'] = $this->places;
        $params['volume'] = $this->volume;
        $params['weight'] = $this->weight;
        $params['comment'] = $this->comment;

        return $params;
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
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getHouse()
    {
        return $this->house;
    }

    /**
     * @param string $house
     */
    public function setHouse($house)
    {
        $this->house = $house;
    }

    /**
     * @return string
     */
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * @param string $building
     */
    public function setBuilding($building)
    {
        $this->building = $building;
    }

    /**
     * @return string
     */
    public function getCorpus()
    {
        return $this->corpus;
    }

    /**
     * @param string $corpus
     */
    public function setCorpus($corpus)
    {
        $this->corpus = $corpus;
    }

    /**
     * @return string
     */
    public function getFlat()
    {
        return $this->flat;
    }

    /**
     * @param string $flat
     */
    public function setFlat($flat)
    {
        $this->flat = $flat;
    }

    /**
     * @return string
     */
    public function getContactPerson()
    {
        return $this->contact_person;
    }

    /**
     * @param string $contact_person
     */
    public function setContactPerson($contact_person)
    {
        $this->contact_person = $contact_person;
    }

    /**
     * @return string
     */
    public function getContactPhone()
    {
        return $this->contact_phone;
    }

    /**
     * @param string $contact_phone
     */
    public function setContactPhone($contact_phone)
    {
        $this->contact_phone = $contact_phone;
    }

    /**
     * @return string
     */
    public function getTakingDate()
    {
        return $this->taking_date;
    }

    /**
     * @param string $taking_date
     */
    public function setTakingDate($taking_date)
    {
        $this->taking_date = $taking_date;
    }

    /**
     * @return string
     */
    public function getTakingTimeFrom()
    {
        return $this->taking_time_from;
    }

    /**
     * @param string $taking_time_from
     */
    public function setTakingTimeFrom($taking_time_from)
    {
        $this->taking_time_from = $taking_time_from;
    }

    /**
     * @return string
     */
    public function getTakingTimeTo()
    {
        return $this->taking_time_to;
    }

    /**
     * @param string $taking_time_to
     */
    public function setTakingTimeTo($taking_time_to)
    {
        $this->taking_time_to = $taking_time_to;
    }

    /**
     * @return int
     */
    public function getPlaces()
    {
        return $this->places;
    }

    /**
     * @param int $places
     */
    public function setPlaces($places)
    {
        $this->places = $places;
    }

    /**
     * @return float
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param float $volume
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
    }

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
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
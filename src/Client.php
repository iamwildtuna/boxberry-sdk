<?php

namespace WildTuna\BoxberrySdk;

use WildTuna\BoxberrySdk\Exception\BoxBerryException;

class Client
{
    /** @var array  */
    private $tokenList = [];
    /** @var null  */
    private $currentToken = null;
    /** @var \GuzzleHttp\Client|null */
    private $httpClient = null;


    public function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri' => 'http://api.boxberry.de/json.php',
            'timeout' => 300,
        ]);

    }

    /**
     * Возвращает токен из хранилища по ключу
     *
     * @param string $key - Ключ токена
     * @return string|false
     */
    public function getToken(string $key)
    {
        return !empty($this->tokenList[$key]) ? $this->tokenList[$key] : false;
    }

    /**
     * Заносит токен в хранилище
     *
     * @param string $key  - Ключ токена
     * @param string$token - Токен доступа к API
     */
    public function setToken(string $key, string $token)
    {
        $this->tokenList[$key] = $token;
    }


    /**
     * Задает токен, который будет использован клиентом для запросов к API
     *
     * @param string $key - Ключ токена
     * @throws \InvalidArgumentException
     */
    public function setCurrentToken(string $key)
    {
        $this->currentToken = $this->getToken($key);
        if (empty($this->currentToken))
            throw new \InvalidArgumentException('Не выбран API-токен!');
    }

    public function getCurrentToken()
    {
        if (empty($this->currentToken))
            throw new \InvalidArgumentException('Не выбран API-токен!');

        return $this->currentToken;
    }


    /**
     * Инициализирует вызов к API
     * @param $method
     * @param $params
     * @return mixed
     * @throws BoxBerryException
     */
    private function callApi($type, $method, $params = [])
    {
        $params['token'] = $this->getCurrentToken();
        $params['method'] = $method;

        switch ($type) {
            case 'GET':
                $response = $this->httpClient->get('', ['query' => $params]);
                break;
            case 'POST':
                break;
        }

        if ($response->getStatusCode() != 200)
            throw new BoxBerryException('Неверный код ответа от сервера BoxBerry при вызове метода '.$method.': ' . $response->getStatusCode(), $response->getStatusCode(), $response->getBody()->getContents());

        $respBB = json_decode($response->getBody()->getContents(), true);

        if (empty($respBB))
            throw new BoxBerryException('От сервера BoxBerry при вызове метода '.$method.' пришел пустой ответ', $response->getStatusCode(), $response->getBody()->getContents());

        if (!empty($respBB[0]['err']))
            throw new BoxBerryException('От сервера BoxBerry при вызове метода '.$method.' получена ошибка: '.$respBB[0]['err'], $response->getStatusCode(), $response->getBody()->getContents());

        return $respBB;
    }

    /**
     * Возврат списка ПВЗ
     *
     * @param boolean $prepaid true - все ПВЗ, false - с возможностью оплаты при получении
     * @param boolean $short - true - краткая информация о ПВЗ с датой последнего изменения
     * @param int $city_code - код города BB, если нужны ПВЗ в заданном городе
     * @throws BoxBerryException
     */
    public function getPvzList($prepaid = false, $short = false, $city_code = null)
    {
        $method = 'ListPoints';

        if ($short)
            $method .= 'Short';

        if ($prepaid)
            $params['prepaid'] = 1;

        if ($city_code)
            $params['CityCode'] = $city_code;

        return $this->callApi('GET', $method, $params);
    }

    /**
     * Возвращает список городов, в которых есть пункты выдачи заказов
     *
     * @param boolean $all - true - список городов, в которых осуществляется доставка + в которых есть ПВЗ
     * @return mixed
     * @throws BoxBerryException
     */
    public function getCityList($all = false)
    {
        $method = 'ListCities';
        if ($all)
            $method .= 'Full';

        return $this->callApi('GET', $method);
    }

    /**
     * Возвращает список почтовых индексов, для которых возможна курьерская доставка
     *
     * @return mixed
     * @throws BoxBerryException
     */
    public function getZipList()
    {
        return $this->callApi('GET', 'ListZips');
    }

    /**
     * Проверка возможности КД в заданном индексе
     *
     * @param $index - Почтовый индекс получателя
     * @return mixed
     * @throws BoxBerryException
     */
    public function checkZip($index)
    {
        $response = $this->callApi('GET', 'ZipCheck', ['Zip' => $index]);
        return $response[0];
    }
}
<?php

namespace WildTuna\BoxberrySdk;

use WildTuna\BoxberrySdk\Entity\CalculateParams;
use WildTuna\BoxberrySdk\Entity\Intake;
use WildTuna\BoxberrySdk\Entity\TariffInfo;
use WildTuna\BoxberrySdk\Exception\BoxBerryException;

class Client
{
    /** @var array  */
    private $tokenList = [];
    /** @var null  */
    private $currentToken = null;
    /** @var \GuzzleHttp\Client|null */
    private $httpClient = null;


    /**
     * Client constructor.
     * @param int $timeout - таймаут ожидания ответа от серверов BoxBerry в секундах
     */
    public function __construct($timeout = 300)
    {
        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri' => 'http://api.boxberry.de/json.php',
            'timeout' => $timeout,
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
        $this->setCurrentToken($key);
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
     *
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
                $response = $this->httpClient->post('', ['query' => $params]);
                break;
        }

        if ($response->getStatusCode() != 200)
            throw new BoxBerryException('Неверный код ответа от сервера BoxBerry при вызове метода '.$method.': ' . $response->getStatusCode(), $response->getStatusCode(), $response->getBody()->getContents());

        $respBB = json_decode($response->getBody()->getContents(), true);

        if (empty($respBB))
            throw new BoxBerryException('От сервера BoxBerry при вызове метода '.$method.' пришел пустой ответ', $response->getStatusCode(), $response->getBody()->getContents());

        if (!empty($respBB['err']))
            throw new BoxBerryException('От сервера BoxBerry при вызове метода '.$method.' получена ошибка: '.$respBB['err'], $response->getStatusCode(), $response->getBody()->getContents());


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
        $params = [];

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
     * @param int $index - Почтовый индекс получателя
     * @return mixed
     * @throws BoxBerryException
     */
    public function checkZip($index)
    {
        $response = $this->callApi('GET', 'ZipCheck', ['Zip' => $index]);
        return $response[0];
    }

    /**
     * Информация о статусах заказа
     *
     * @param string $order_id - ID заказа магазина или трекномер BB
     * @param bool $all true - полная информация, false - краткая информация
     * @return mixed
     * @throws BoxBerryException
     */
    public function getOrderStatuses($order_id, $all = false)
    {
        $method = 'ListStatuses';
        if ($all)
            $method .= 'Full';

        return $this->callApi('GET', $method, ['ImId' => $order_id]);
    }

    /**
     * Информация о услугах по отправлению
     *
     * @param string $order_id - ID заказа магазина или трекномер BB
     * @return mixed
     * @throws BoxBerryException
     */
    public function getOrderServices($order_id)
    {
        $response = $this->callApi('GET', 'ListServices', ['ImId' => $order_id]);
        if (empty($response) || empty($response[0]['Sum'])) {
            return false;
        } else {
            return $response;
        }
    }

    /**
     * Список городов, в которых осуществляется курьерская доставка
     *
     * @return mixed
     * @throws BoxBerryException
     */
    public function getCourierCities()
    {
        return $this->callApi('GET', 'CourierListCities');
    }

    /**
     * Список точек приема посылок
     *
     * @return mixed
     * @throws BoxBerryException
     */
    public function getPointsForParcels()
    {
        return $this->callApi('GET', 'PointsForParcels');
    }


    /**
     * Информация о ПВЗ
     *
     * @param int $point_id
     * @param bool $photo
     * @return mixed
     * @throws BoxBerryException
     */
    public function pointDetails($point_id, $photo = false)
    {
        if ($photo) $photo = 1 ; else $photo = 0;

        return $this->callApi('GET', 'PointsDescription', ['code' => $point_id, 'photo' => $photo]);
    }

    /**
     * Расчета тарифа на доставку
     *
     * @param CalculateParams $calcParams
     * @return TariffInfo
     * @throws BoxBerryException
     */
    public function calcTariff($calcParams)
    {
        $params = $calcParams->asArr();
        $response = $this->callApi('GET', 'DeliveryCosts', $params);
        return new TariffInfo($response);
    }

    /**
     * @param string $order_id - ID заказа магазина или трекномер BB
     * @return mixed
     * @throws BoxBerryException
     */
    public function getOrderInfo($order_id)
    {
        return $this->callApi('GET', 'ParselCheck', ['ImId' => $order_id]);
    }

    /**
     * Получает информацию по заказам, которые фактически переданы на доставку в BoxBerry, но они еще не доставлены получателю
     *
     * @return mixed
     * @throws BoxBerryException
     */
    public function getOrdersInProgress()
    {
        return $this->callApi('GET', 'OrdersBalance');
    }

    /**
     * Позволяет получить список созданных через API посылок
     * Если не указывать диапазоны дат, то будет возвращен последний созданный заказ
     *
     * @param string $from - период от (дата в любом формате)
     * @param string $to - период до (дата в любом формате)
     * @return mixed
     * @throws BoxBerryException
     */
    public function getOrderList($from = null, $to = null)
    {
        $params = [];

        if ($from)
            $params['from'] = date('Ymd', strtotime($from));

        if ($to)
            $params['to'] = date('Ymd', strtotime($to));

        return $this->callApi('GET', 'ParselStory', $params);
    }

    /**
     * Создание заявки на забор
     *
     * @param Intake $intake - заявка на забор
     * @return int - номер созданной заявки на забор
     * @throws BoxBerryException
     */
    public function createIntake($intake)
    {
        $params = $intake->asArr();
        $response = $this->callApi('GET', 'CreateIntake', $params);
        if (empty($response['message']))
            throw new BoxBerryException('От сервера BoxBerry не пришел номер заявки!');

        return $response['message'];
    }


    /**
     * Позволяет получить список всех трекинг кодов посылок которые есть в кабинете но не были сформированы в акт
     *
     * @param bool $arr - вернуть список в виде массива
     * @return array|string
     * @throws BoxBerryException
     */
    public function getOrdersNotAct($arr = false)
    {
        $response = $this->callApi('GET', 'ParselList');
        if ($arr)
            return explode(',', $response['ImIds']);
        else
            return $response['ImIds'];
    }
}
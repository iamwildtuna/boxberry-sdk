[![Latest Stable Version](https://poser.pugx.org/iamwildtuna/boxberry-sdk/v/stable)](https://packagist.org/packages/iamwildtuna/boxberry-sdk)
[![Total Downloads](https://poser.pugx.org/iamwildtuna/boxberry-sdk/downloads)](https://packagist.org/packages/iamwildtuna/boxberry-sdk)
[![License](https://poser.pugx.org/iamwildtuna/boxberry-sdk/license)](https://packagist.org/packages/iamwildtuna/boxberry-sdk)
[![Telegram Chat](https://img.shields.io/badge/telegram-chat-blue.svg?logo=telegram)](https://t.me/phpboxberrysdk)

# Содержание      
[Changelog](#changelog)  
[Статусы заказа](#getOrderStatuses)  
[Услуги в заказе](#getOrderServices)  
[Список ПВЗ](#getPvzList)  
[Расчет тарифа](#calcTariff)  
[Полная информация о ПВЗ](#pointDetails)  
[Информация о заказе](#getOrderInfo)  
[Список городов](#getCityList)  
[Почтовые индексы с КД](#getZipList)  
[Проверка почтового индекса](#checkZip)  
[Список городов с КД](#getCourierCities)  
[Список точек приема посылок](#getPointsForParcels)  
[Список созданных заказов](#getOrderList)   
[Список доставляющихся заказов](#getOrdersInProgress)   
[Заявка на забор](#createIntake)  
  

<a name="links"><h1>Changelog</h1></a>

- 0.3.0 - Реализованы основные функции API [сервисов BoxBerry](https://api.boxberry.de/?act=info&sub=api_info_services);


# Установка  
Для установки можно использовать менеджер пакетов Composer

    composer require iamwildtuna/boxberry-sdk
    
# Настройка токенов
API клиент позволяет использовать несколько токенов и переключатсья между ними.  
При добавлении токенов последний добавленный становися выбранным.

Добавление токенов при инициализации:
```php
<?php
$bbClient = new \WildTuna\BoxberrySdk\Client();
$bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
$bbClient->setToken('another', 'another_bb_api_token');
````

Переключение токенов:    
```php
<?php
$bbClient->setCurrentToken('main');
$bbClient->setCurrentToken('another');
````
   
    
<a name="getOrderStatuses"><h1>Статусы заказа</h1></a>  
Возвращает статусы заказа по трек-номеру BB или номеру заказа ИМ.
  
**Входные параметры:**  
 - *order_id (string)* - трек-номер / номер ИМ
 - *all (boolean)* - true - полная информация, false - краткая информация (по умолчанию false)

**Выходные параметры:**  
Ассоциативный массив данных о ПВЗ

**Примеры вызова:**
```php
<?php
$bbClient = new \WildTuna\BoxberrySdk\Client();
$bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
$bbClient->setCurrentToken('main'); // Указываем клиенту использовать ключ main для запросов

try {
    $bbClient->getOrderStatuses('DUD15086277');
    /*
     Array
     (
         [0] => Array
             (
                 [Date] => 2019-05-01T00:56:12
                 [Name] => Принято к доставке
                 [Comment] =>
             )
     
         [1] => Array
             (
                 [Date] => 2019-05-01T00:56:13
                 [Name] => Передано на сортировку
                 [Comment] =>
             )
     
         [2] => Array
             (
                 [Date] => 2019-05-03T08:43:56
                 [Name] => Передан на доставку до пункта выдачи
                 [Comment] =>
             )
     
         [3] => Array
             (
                 [Date] => 2019-05-04T06:47:48
                 [Name] => Передан на доставку до пункта выдачи
                 [Comment] =>
             )
     
         [4] => Array
             (
                 [Date] => 2019-05-04T11:48:01
                 [Name] => Поступило в пункт выдачи
                 [Comment] => Москва (115478, Москва г, Каширское ш, д.24, строение 7)
             )
     
     )
    */
    
    $bbClient->getOrderStatuses('DUD15086277', true);
    /*
     Array
     (
         [statuses] => Array
             (
                 [0] => Array
                     (
                         [Date] => 30.04.2019 15:35
                         [Name] => Загружен реестр ИМ
                         [Comment] =>
                     )
     
                 [1] => Array
                     (
                         [Date] => 01.05.2019 00:56
                         [Name] => Принято к доставке
                         [Comment] =>
                     )
     
                 [2] => Array
                     (
                         [Date] => 01.05.2019 00:56
                         [Name] => Передано на сортировку
                         [Comment] =>
                     )
     
                 [3] => Array
                     (
                         [Date] => 03.05.2019 08:43
                         [Name] => Передан на доставку до пункта выдачи
                         [Comment] =>
                     )
     
                 [4] => Array
                     (
                         [Date] => 04.05.2019 06:47
                         [Name] => Передан на доставку до пункта выдачи
                         [Comment] =>
                     )
     
                 [5] => Array
                     (
                         [Date] => 04.05.2019 11:48
                         [Name] => Поступило в пункт выдачи
                         [Comment] => Москва (115478, Москва г, Каширское ш, д.24, строение 7)
                     )
     
             )
     
         [PD] =>
         [sum] => 5843
         [Weight] => 1.58
         [PaymentMethod] => Касса
     )
     */
}

catch (\WildTuna\BoxberrySdk\Exception\BoxBerryException $e) {
    // Обработка ошибки вызова API BB
    // $e->getMessage(); текст ошибки 
    // $e->getCode(); http код ответа сервиса BB
    // $e->getRawResponse(); // ответ сервера BB как есть (http request body)
}

catch (\Exception $e) {
    // Обработка исключения
}
```    

<a name="getOrderServices"><h1>Услуги в заказе</h1></a>  
Возвращает информацию о услугах по трек-номеру BB или номеру заказа ИМ.
  
**Входные параметры:**  
 - *order_id (string)* - трек-номер / номер ИМ
 
**Выходные параметры:**  
Ассоциативный массив данных о ПВЗ

**Примеры вызова:**
```php
<?php
$bbClient = new \WildTuna\BoxberrySdk\Client();
$bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
$bbClient->setCurrentToken('main'); // Указываем клиенту использовать ключ main для запросов

try {
    $bbClient->getOrderServices('DUD15086277');
    /*
     Array
     (
         [0] => Array
             (
                 [Name] => Пост_Базовый расчет
                 [Sum] => 150,36
                 [Date] => 2019-05-03T00:00:00
                 [PaymentMethod] => Эквайринг
             )
     
         [1] => Array
             (
                 [Name] => Пост_Выдача со вскрытием и проверкой комплектности
                 [Sum] => 19
                 [Date] => 2019-05-03T00:00:00
                 [PaymentMethod] => Эквайринг
             )
     
         [2] => Array
             (
                 [Name] => Пост_Извещение Вайбер и СМС
                 [Sum] => 2
                 [Date] => 2019-05-03T00:00:00
                 [PaymentMethod] => Эквайринг
             )
     
         [3] => Array
             (
                 [Name] => Пост_Страховой сбор
                 [Sum] => 10,75
                 [Date] => 2019-05-03T00:00:00
                 [PaymentMethod] => Эквайринг
             )
     
         [4] => Array
             (
                 [Name] => Эквайринг
                 [Sum] => 64,5
                 [Date] => 2019-05-03T00:00:00
                 [PaymentMethod] => Эквайринг
             )
     
     )
     */
}

catch (\WildTuna\BoxberrySdk\Exception\BoxBerryException $e) {
    // Обработка ошибки вызова API BB
    // $e->getMessage(); текст ошибки 
    // $e->getCode(); http код ответа сервиса BB
    // $e->getRawResponse(); // ответ сервера BB как есть (http request body)
}

catch (\Exception $e) {
    // Обработка исключения
}
```    
    
    
<a name="getPvzList"><h1>Список ПВЗ</h1></a>  
Для получения списка ПВЗ нужно использовать метод **$bbClient->getPvzList**.
  
**Входные параметры:**  
 - *$prepaid (boolean)* - false с возможностью оплаты при получении, true работающие с любым типом посылок (по умолчанию false)
 - *$short (boolean)* - краткая информация о ПВЗ с датой последнего изменения (по умолчанию false)
 - *$city_code (integer)* - позволяет выбрать ПВЗ только в заданном городе BoxBerry (по умолчанию null)

**Выходные параметры:**  
Ассоциативный массив данных о ПВЗ

**Примеры вызова:**
```php
<?php
$bbClient = new \WildTuna\BoxberrySdk\Client();
$bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
$bbClient->setCurrentToken('main'); // Указываем клиенту использовать ключ main для запросов

try {
    $result = $bbClient->getPvzList(); // С возможностью оплаты при получении
    /*Array
      (
          [0] => Array
              (
                  [Code] => 78031
                  [Name] => Санкт-Петербург Комендантский_7803_С
                  [Address] => 197227, Санкт-Петербург г, Комендантская пл, д.8, литер А, оф. 5Н
                  [Phone] => +7(812)930-09-15
                  [WorkSchedule] => пн-вс: 10.00-21.00
                  [TripDescription] => Метро  -  "Комендантский проспект".
      Примерное расстояние от метро до отделения - 400 метров.
      Жилой дом.
      Вход через магазин "Цветы".
      Цокольный этаж.
                  [DeliveryPeriod] => 1
                  [CityCode] => 116
                  [CityName] => Санкт-Петербург
                  [TariffZone] => 2
                  [Settlement] => Санкт-Петербург
                  [Area] => Санкт-Петербург
                  [Country] => РОССИЯ
                  [OnlyPrepaidOrders] => No
                  [AddressReduce] => Комендантская пл, д.8, литер А, оф. 5Н
                  [Acquiring] => Yes
                  [DigitalSignature] => No
                  [TypeOfOffice] => СПВЗ
                  [NalKD] => No
                  [Metro] => Комендантский проспект
                  [VolumeLimit] => 0.48
                  [LoadLimit] => 15
                  [GPS] => 60.005783,30.258888
              )
      
          [1] => Array
              (
                  [Code] => 78041
    */
    
    $result = $bbClient->getPvzList(true, true); // Краткая информация о всех ПВЗ с датой последнего изменения
    /*Array
      (
          [0] => Array
              (
                  [CityCode] => 116
                  [Code] => 78031
                  [UpdateDate] => 2019-04-17 13:25:22
              )
      
          [1] => Array
              (
                  [CityCode] => 116
                  [Code] => 78041
                  [UpdateDate] => 2019-04-24 15:06:46
              )
      
          [2] => Array
              (
                  [CityCode] => 116
                  [Code] => 78051
                  [UpdateDate] => 2019-04-25 15:37:24
              )
    */
}

catch (\WildTuna\BoxberrySdk\Exception\BoxBerryException $e) {
    // Обработка ошибки вызова API BB
    // $e->getMessage(); текст ошибки 
    // $e->getCode(); http код ответа сервиса BB
    // $e->getRawResponse(); // ответ сервера BB как есть (http request body)
}

catch (\Exception $e) {
    // Обработка исключения
}
```

<a name="calcTariff"><h1>Расчет тарифа</h1></a>  
Для расчета тарифа на доставку нужно использовать метод **$bbClient->calcTariff**.
  
**Входные параметры:**  
Объект *\WildTuna\BoxberrySdk\Entity\CalculateParams*

**Выходные параметры:**  
Объект *\WildTuna\BoxberrySdk\Entity\TariffInfo*

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $calcParams = new \WildTuna\BoxberrySdk\Entity\CalculateParams();
    $calcParams->setWeight(1000);
    $calcParams->setPvz(61831);
    $calcParams->setAmount(1250.60);
    
    $result = $bbClient->calcTariff($calcParams);
    
    /*
       WildTuna\BoxberrySdk\Entity\TariffInfo Object
       (
           [price:WildTuna\BoxberrySdk\Entity\TariffInfo:private] => 176.25
           [price_base:WildTuna\BoxberrySdk\Entity\TariffInfo:private] => 168
           [price_service:WildTuna\BoxberrySdk\Entity\TariffInfo:private] => 8.253
           [delivery_period:WildTuna\BoxberrySdk\Entity\TariffInfo:private] => 2
       )
     */
}

catch (\WildTuna\BoxberrySdk\Exception\BoxBerryException $e) {
    // Обработка ошибки вызова API BB
    // $e->getMessage(); текст ошибки 
    // $e->getCode(); http код ответа сервиса BB
    // $e->getRawResponse(); // ответ сервера BB как есть (http request body)
}

catch (\Exception $e) {
    // Обработка исключения
}
```

<a name="pointDetails"><h1>Полная информация о ПВЗ</h1></a>  
Для получения информации о ПВЗ нужно использовать метод **$bbClient->pointDetails**.  
Если передан $photo=true, то в результирующем массиве будет ключ photos, который содержит массив фотографий в base64.

**Входные параметры:**
- *$point_id (integer)* - код ПВЗ
- *$photo (boolean)* - возврат фото ПВЗ (по умолчанию false)  

**Выходные параметры:**  
Ассоциативный массив данных о ПВЗ

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $result = $bbClient->pointDetails(61831); // Без фото
    $result = $bbClient->pointDetails(61831, true); // С фото
    
    /*
     Array
     (
         [CityCode] => 44
         [Reception] => 1
         [IssuanceBoxberry] => 1
         [Name] => Ростов-на-Дону Максима Горького_6183_С
         [Organization] => Общество с ограниченной ответственностью "Атлант"
         [ZipCode] => 344022
         [Country] => РОССИЯ
         [Area] => Ростовская обл
         [CityName] => Ростов-на-Дону
         [Settlement] => Ростов-на-Дону
         [Metro] =>
         [Street] => Максима Горького
         [House] => 285
         [Structure] =>
         [Housing] =>
         [Apartment] =>
         [Address] => 344022, Ростов-на-Дону г, Максима Горького ул, д.285
         [AddressReduce] => Максима Горького ул, д.285
         [GPS] => 47.231912,39.737686
         [TripDescription] => Остановка: Театральный.
     Примерное расстояние от остановки до Отделения  -  200 метров.
     Жилой 9-ти этажный дом.
     Отдельный вход со стороны дороги. 1 этаж.
         [Phone] => 8-800-222-80-00
         [ForeignOnlineStoresOnly] => 0
         [PrepaidOrdersOnly] => 0
         [Acquiring] => 1
         [DigitalSignature] => 0
         [TypeOfOffice] => 2
         [ReceptionLaP] => 1
         [DeliveryLaP] => 1
         [LoadLimit] => 15
         [VolumeLimit] => 0.48
         [EnablePartialDelivery] => 1
         [EnableFitting] => 1
         [fittingType] => 1
         [WorkShedule] => пн-вс: 10.00-19.00
         [WorkMoBegin] => 10:00
         [WorkMoEnd] => 19:00
         [WorkTuBegin] => 10:00
         [WorkTuEnd] => 19:00
         [WorkWeBegin] => 10:00
         [WorkWeEnd] => 19:00
         [WorkThBegin] => 10:00
         [WorkThEnd] => 19:00
         [WorkFrBegin] => 10:00
         [WorkFrEnd] => 19:00
         [WorkSaBegin] => 10:00
         [WorkSaEnd] => 19:00
         [WorkSuBegin] => 10:00
         [WorkSuEnd] => 19:00
         [LunchMoBegin] =>
         [LunchMoEnd] =>
         [LunchTuBegin] =>
         [LunchTuEnd] =>
         [LunchWeBegin] =>
         [LunchWeEnd] =>
         [LunchThBegin] =>
         [LunchThEnd] =>
         [LunchFrBegin] =>
         [LunchFrEnd] =>
         [LunchSaBegin] =>
         [LunchSaEnd] =>
         [LunchSuBegin] =>
         [LunchSuEnd] =>
         [TerminalCode] => 50
         [TerminalName] => Ростов-на-Дону Каширская_6101
         [TerminalOrganization] => ООО "Боксберри Юг"
         [TerminalCityCode] => 44
         [TerminalCityName] => Ростов-на-Дону
         [TerminalAddress] => 344091, Ростов-на-Дону г, Каширская ул, д.9/53а
         [TerminalPhone] => 8-800-222-80-00
         [CourierDelivery] => 0
         [CountryCode] => 643
         [AddressInfo] =>
         [Terminal] => 0
         [TransType] => 1
         [InterRefunds] => 1
         [ExpressReception] => 0
         [extraCode] => 6183
         [TemporaryWorkSchedule] =>
     )
     */
}

catch (\WildTuna\BoxberrySdk\Exception\BoxBerryException $e) {
    // Обработка ошибки вызова API BB
    // $e->getMessage(); текст ошибки 
    // $e->getCode(); http код ответа сервиса BB
    // $e->getRawResponse(); // ответ сервера BB как есть (http request body)
}

catch (\Exception $e) {
    // Обработка исключения
}
```

<a name="getOrderInfo"><h1>Информация о заказе</h1></a>  
Позволяет получить ссылку на файл печати этикеток, список штрих-кодов коробок в посылке через запятую (,), 
список штрих-кодов выгруженных коробок в посылке через запятую (,) . Обязательно наличие параметра (код отслеживания заказа).    
**Внимание!** сервис работает только с посылками созданными в api.boxberry.de.

**Входные параметры:**  
 - *order_id (string)* - трек-номер / номер ИМ

**Выходные параметры:**  
Ассоциативный массив данных

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $result = $bbClient->getOrderInfo('DUD15086277');
}
catch (\WildTuna\BoxberrySdk\Exception\BoxBerryException $e) {
    // Обработка ошибки вызова API BB
    // $e->getMessage(); текст ошибки 
    // $e->getCode(); http код ответа сервиса BB
    // $e->getRawResponse(); // ответ сервера BB как есть (http request body)
}

catch (\Exception $e) {
    // Обработка исключения
}
```

<a name="getCityList"><h1>Список городов</h1></a>  
Позволяет получить список городов, в которых есть пункты выдачи и список городов, в которых есть курьерская доставка.

**Входные параметры:**
- *$all (boolean)* - false - список городов, в которых есть ПВЗ, true список городов, в которых осуществляется доставка + в которых есть ПВЗ (по умолчанию false)

**Выходные параметры:**  
Ассоциативный массив данных

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $result = $bbClient->getCityList();
    /*
     Array
     (
         [0] => Array
             (
                 [Code] => 172
                 [Name] => Геленджик
                 [ReceptionLaP] => 1
                 [DeliveryLaP] => 1
                 [Reception] => 1
                 [ForeignReceptionReturns] => 1
                 [Terminal] => 1
                 [Kladr] => 2300000300000
                 [Region] => Краснодарский
                 [CountryCode] => 643
                 [UniqName] => Геленджик
                 [District] =>
                 [Prefix] => г
             )
     
         [1] => Array
             (
                 [Code] => 04626
                 [Name] => Долгопрудный
                 [ReceptionLaP] => 1
                 [DeliveryLaP] => 1
                 [Reception] => 1
                 [ForeignReceptionReturns] => 1
                 [Terminal] => 0
                 [Kladr] => 5000002900000
                 [Region] => Московская
                 [CountryCode] => 643
                 [UniqName] => Долгопрудный
                 [District] =>
                 [Prefix] => г
             )
     */
}
catch (\WildTuna\BoxberrySdk\Exception\BoxBerryException $e) {
    // Обработка ошибки вызова API BB
    // $e->getMessage(); текст ошибки 
    // $e->getCode(); http код ответа сервиса BB
    // $e->getRawResponse(); // ответ сервера BB как есть (http request body)
}

catch (\Exception $e) {
    // Обработка исключения
}
```


<a name="getZipList"><h1>Почтовые индексы с КД</h1></a>  
Возвращает список почтовых индексов, для которых возможна курьерская доставка.  

**Выходные параметры:**  
Ассоциативный массив данных

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $result = $bbClient->getZipList();
    /*
     Array
     (
         [0] => Array
             (
                 [Zip] => 187033
                 [City] =>
                 [Region] =>
                 [Area] =>
                 [ZoneExpressDelivery] => 1
                 [ExpressDelivery] => Да
             )
     
         [1] => Array
             (
                 [Zip] => 655001
                 [City] => Абакан
                 [Region] =>
                 [Area] => Хакасия
                 [ZoneExpressDelivery] => 1
                 [ExpressDelivery] => Да
             )
     */
}
catch (\WildTuna\BoxberrySdk\Exception\BoxBerryException $e) {
    // Обработка ошибки вызова API BB
    // $e->getMessage(); текст ошибки 
    // $e->getCode(); http код ответа сервиса BB
    // $e->getRawResponse(); // ответ сервера BB как есть (http request body)
}

catch (\Exception $e) {
    // Обработка исключения
}
```


<a name="checkZip"><h1>Проверка почтового индекса</h1></a>  
Проверка возможности курьерской доставки в заданном индексе.  

**Входные параметры:**  
- $index (integer) - Почтовый индекс

**Выходные параметры:**  
Ассоциативный массив данных

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $result = $bbClient->checkZip(115551);
    /*
     Array
     (
         [ExpressDelivery] => 1
         [ZoneExpressDelivery] => 2
     )
     */
}
catch (\WildTuna\BoxberrySdk\Exception\BoxBerryException $e) {
    // Обработка ошибки вызова API BB
    // $e->getMessage(); текст ошибки 
    // $e->getCode(); http код ответа сервиса BB
    // $e->getRawResponse(); // ответ сервера BB как есть (http request body)
}

catch (\Exception $e) {
    // Обработка исключения
}
```

<a name="getCourierCities"><h1>Список городов с КД</h1></a>  
Список городов, в которых осуществляется курьерская доставка.

**Выходные параметры:**  
Ассоциативный массив данных

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $result = $bbClient->getCourierCities();
    /*
     Array
     (
         [0] => Array
             (
                 [City] => Абакан
                 [Region] =>
                 [Area] => Хакасия
                 [DeliveryPeriod] => 7.00
             )
     
         [1] => Array
             (
                 [City] => Авдулово
                 [Region] => Данковский
                 [Area] => Липецкая
                 [DeliveryPeriod] =>
             )
     */
}
catch (\WildTuna\BoxberrySdk\Exception\BoxBerryException $e) {
    // Обработка ошибки вызова API BB
    // $e->getMessage(); текст ошибки 
    // $e->getCode(); http код ответа сервиса BB
    // $e->getRawResponse(); // ответ сервера BB как есть (http request body)
}

catch (\Exception $e) {
    // Обработка исключения
}
```

<a name="getPointsForParcels"><h1>Список точек приема посылок</h1></a>  
Список точек приема посылок.

**Выходные параметры:**  
Ассоциативный массив данных

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $result = $bbClient->getPointsForParcels();
    /*
     Array
     (
         [0] => Array
             (
                 [Code] => 04854
                 [Name] => Санкт-Петербург Терминал
                 [City] => Санкт-Петербург
             )
     
         [1] => Array
             (
                 [Code] => 82010
                 [Name] => Симферополь Караимская_8201
                 [City] => Симферополь
             )

     */
}
catch (\WildTuna\BoxberrySdk\Exception\BoxBerryException $e) {
    // Обработка ошибки вызова API BB
    // $e->getMessage(); текст ошибки 
    // $e->getCode(); http код ответа сервиса BB
    // $e->getRawResponse(); // ответ сервера BB как есть (http request body)
}

catch (\Exception $e) {
    // Обработка исключения
}
```

<a name="getOrderList"><h1>Список созданных заказов</h1></a>  
Позволяет получить список созданных через API посылок.  
Если не указывать диапазоны дат, то будет возвращен последний созданный заказ.  

**Выходные параметры:**  
- $from (string) - период от (дата в любом формате)
- $to (string) - период до (дата в любом формате)
     
**Выходные параметры:**  
Ассоциативный массив данных  

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $result = $bbClient->getOrderList();
    /*
     Array
     (
         [0] => Array
             (
                 [track] => DUD15191668
                 [label] =>
                 [date] => 2019.05.06 15:32:51
                 [send] => 1
                 [barcode] => DUD8133818
                 [imid] => 8133818
             )
     
     )
     */
}
catch (\WildTuna\BoxberrySdk\Exception\BoxBerryException $e) {
    // Обработка ошибки вызова API BB
    // $e->getMessage(); текст ошибки 
    // $e->getCode(); http код ответа сервиса BB
    // $e->getRawResponse(); // ответ сервера BB как есть (http request body)
}

catch (\Exception $e) {
    // Обработка исключения
}
```

<a name="getOrdersInProgress"><h1>Список доставляющихся заказов</h1></a>  
Получает информацию по заказам, которые фактически переданы на доставку в BoxBerry, но они еще не доставлены получателю.

**Выходные параметры:**  
Ассоциативный массив данных

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $result = $bbClient->getOrdersInProgress();
    /*
     Array
     (
         [0] => Array
             (
                 [ID] => 4194177
                 [Status] => На отделении-получателе
                 [Price] => 0
                 [Delivery_sum] => 0
                 [Payment_sum] => 3289
             )
    
         [1] => Array
             (
                 [ID] => 1178452
                 [Status] => В пути на терминал
                 [Price] => 0
                 [Delivery_sum] => 0
                 [Payment_sum] => 2600
             )

     */
}
catch (\WildTuna\BoxberrySdk\Exception\BoxBerryException $e) {
    // Обработка ошибки вызова API BB
    // $e->getMessage(); текст ошибки 
    // $e->getCode(); http код ответа сервиса BB
    // $e->getRawResponse(); // ответ сервера BB как есть (http request body)
}

catch (\Exception $e) {
    // Обработка исключения
}
```

<a name="createIntake"><h1>Заявка на забор</h1></a>  
Создание заявки на забор заказов.

**Входные параметры:** 
Объект *\WildTuna\BoxberrySdk\Entity\Intake* - параметры заявки

**Выходные параметры:**  
integer - номер заявки в системе BB

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $intake = new \WildTuna\BoxberrySdk\Entity\Intake();
    $intake->setZip(105005);
    $intake->setCity('Москва');
    $intake->setStreet('Бауманская ул.');
    $intake->setHouse(56);
    $intake->setCorpus(5);
    $intake->setBuilding('в');
    $intake->setFlat(4);
    $intake->setContactPerson('Иванов Иван Иванович');
    $intake->setContactPhone('79095556677');
    $intake->setTakingDate('2019-05-07');
    $intake->setPlaces(2);
    $intake->setVolume(5);
    $intake->setWeight(5);
    $intake->setComment('Примечание к заявке');
    
    $intake_num = $bbClient->createIntake($intake); // $intake_num = 54851
    
}

catch (\WildTuna\BoxberrySdk\Exception\BoxBerryException $e) {
    // Обработка ошибки вызова API BB
    // $e->getMessage(); текст ошибки 
    // $e->getCode(); http код ответа сервиса BB
    // $e->getRawResponse(); // ответ сервера BB как есть (http request body)
}

catch (\Exception $e) {
    // Обработка исключения
}
```
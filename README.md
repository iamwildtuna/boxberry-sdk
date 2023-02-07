<a href="https://lapaygroup.ru/"><img align="left" width="200" src="https://lapaygroup.ru/img/lapaygroup.svg"></a>
<a href="https://boxberry.ru/business_solutions/it_solutions/1089980/"><img align="right" width="200" src="https://lapaygroup.ru/bblogo.svg"></a>    

<br /><br /><br />

[![Latest Stable Version](https://poser.pugx.org/wildtuna/boxberry-sdk/v/stable)](https://packagist.org/packages/wildtuna/boxberry-sdk)
[![Total Downloads](https://poser.pugx.org/wildtuna/boxberry-sdk/downloads)](https://packagist.org/packages/wildtuna/boxberry-sdk)
[![License](https://poser.pugx.org/wildtuna/boxberry-sdk/license)](https://packagist.org/packages/wildtuna/boxberry-sdk)
[![Telegram Chat](https://img.shields.io/badge/telegram-chat-blue.svg?logo=telegram)](https://t.me/phpboxberrysdk)

# SDK для [интеграции с программным комплексом Boxberry](https://api.boxberry.de/).  

Посмотреть все проекты или подарить автору кофе можно [тут](https://lapaygroup.ru/opensource).     

[База знаний BoxBerry](https://help.boxberry.ru/pages/viewpage.action?pageId=762955).    

Обратите внимание, что теперь у BoxBerry несколько API адресов:  
 - https://api.boxberry.de/json.php - для старых клиентов;  
 - https://api.boxberry.ru/json.php - для новых клиентов;  
 - https://account.boxberry.ru/json.php - для новых клиентов;  
 - https://api.boxberry.org - резервный адрес.    

По умолчанию API выбирает api.boxberry.de, для смены адреса необходимо при инициализации клиента вторым параметром передать нужный адрес.  

**Пример:**   
```php
<?php
$bbClient = new \WildTuna\BoxberrySdk\Client(120, 'https://api.boxberry.ru/json.php');
$bbClient->setToken('main', 'bb_api_token');
```

# Содержание      
[Changelog](#changelog)  
[Установка](#install)  
[Настройка токенов](#settings)  
[Отладка](#debugging)  
[Создание/Редактирование заказа](#createOrder)  
[Удаление/Отзыв заказа по номеру заказа магазина](#deleteOrderByOrderId)  
[Удаление/Отзыв заказа по трекномеру](#deleteOrderByTrack)  
[Статусы заказа](#getOrderStatuses)  
[Услуги в заказе](#getOrderServices)  
[Список ПВЗ](#getPvzList)  
[Расчет тарифа](#calcTariff)  
[Полная информация о ПВЗ](#pointDetails)  
[Этикетка по заказу](#getLabel)  
[Получить файл этикетки](#getLabelFile)  
[Получить файл по ссылке](#getFileByLink)
[Получить список заказов по трек номеру или номеру заказа магазина](#getAllOrdersInfo)   
[Информация о заказе по номеру заказа магазина](#getOrderInfoByOrderId)   
[Информация о заказе по трекномеру](#getOrderInfoByTrack)
[Список городов](#getCityList)  
[Почтовые индексы с КД](#getZipList)  
[Проверка почтового индекса](#checkZip)  
[Список городов с КД](#getCourierCities)  
[Список точек приема посылок](#getPointsForParcels)  
[Список созданных заказов](#getOrderList)   
[Список доставляющихся заказов](#getOrdersInProgress)   
[Заявка на забор](#createIntake)  
[Список заказов не добавленных в акт](#getOrdersNotAct)  
[Создание акта передачи посылок](#createOrdersTransferAct)  
[Список созданных актов передачи посылок](#getActsList)  
[Получить файл "Акта приема передачи посылки (АПП)" по номеру АПП](#getParcelFileActToId)  
[Получить файл акта ТМЦ (если подключена услуга в ЛК) по номеру АПП](#getParcelFileActTMCToId)  
[Получить печатную форму этикеток по номеру АПП](#getParcelFileBarcodesToId)  
  

<a name="links"><h1>Changelog</h1></a>
- 0.8.7 - Совместимость с Guzzle 7.4;
- 0.8.6 - Добавлен метод для получения списка заказов по трек номерам или по номерам заказа магазина. Доработкой занимался [Maxim Rodionov](https://github.com/maxbrown1);
- 0.8.5 - Добавлены методы для прямого получения печатных форм: акта, акта ТМЦ, этикеток по АПП. Доработкой занимался [Maxim Rodionov](https://github.com/maxbrown1);
- 0.8.4 - Добавлен метод получения этикетки. Спасибо [Maxim Rodionov](https://github.com/maxbrown1) за доработку;    
- 0.8.3 - Исправлен вызов методов поулчения информации о заказе. Спасибо [Maxim Rodionov](https://github.com/maxbrown1) за доработку;   
- 0.8.1 - Добавлены новые методы API. Подробнее [тут](https://github.com/iamwildtuna/boxberry-sdk/releases/tag/0.8.1). Спасибо [Maxim Rodionov](https://github.com/maxbrown1) за доработку;   
- 0.8.0 - Добавлена поддержка новый свойства в сущности Order и Place. Спасибо [Maxim Rodionov](https://github.com/maxbrown1) за доработку;
- 0.7.8 - Совместимость с Guzzle 7.3;  
- 0.7.7 - Совместимость с Guzzle 7.2;   
- 0.7.6 - Совместимость с Guzzle 7.1;  
- 0.7.5 - Совместимость с Guzzle 7;   
- 0.7.4 - Исправлено добавление параметров для заказов Почты России. Спасибо [Vasiliy](https://github.com/livevasiliy) за обнаружение и исправление;  
- 0.7.3 - Обновлена зависимость с Guzzle;  
- 0.7.2 - Исправлены опечатки и доделана совместимость с PHP 5.5/5.6. Спасибо [Алексею](https://github.com/fazer) за внимательность;  
- 0.7.1 - Исправлена поломанная совместимость с PHP 5.5/5.6;  
- 0.7.0 - Описание можно посмотреть [тут](https://github.com/iamwildtuna/boxberry-sdk/releases/tag/0.7.0);  
- 0.6.2 - Поддержка разных адресов API;  
- 0.6.1 - Доработка логирования;  
- 0.6.0 - Добавлено логирование запросов и ответов к API;  
- 0.5.1 - Понижена минимальная требуемая версия PHP до 5.5;  
- 0.5.0 - Реализованы все функции API BoxBerry;  
- 0.4.0 - Реализованы основные функции API [справка API](https://api.boxberry.de/?act=info&sub=api_info_lk);   
- 0.3.0 - Реализованы основные функции API [сервисов BoxBerry](https://api.boxberry.de/?act=info&sub=api_info_services).   


<a name="install"><h1>Установка</h1></a>  
Для установки можно использовать менеджер пакетов Composer

    composer require wildtuna/boxberry-sdk
    
<a name="settings"><h1>Настройка токенов</h1></a>  
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

<a name="debugging"><h1>Отладка</h1></a>  
Для логирования запросов и ответов используется [стандартный PSR-3 логгер](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-3-logger-interface.md). 
Ниже приведен пример логирования используя [Monolog](https://github.com/Seldaek/monolog).  

```php
<?php
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    
    $log = new Logger('name');
    $log->pushHandler(new StreamHandler('log.txt', Logger::INFO));
    
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'token');
    $bbClient->setCurrentToken('main');
    $bbClient->setLogger($log);
    $result = $bbClient->getCityList();
    
```  

В log.txt будут следующие строки:
```
[2019-07-19 13:09:58] name.INFO: BoxBerry API request: token=TOKEN&method=ListCities [] []
[2019-07-19 13:09:58] name.INFO: BoxBerry API response: [{"Code":"172","Name":"\u0413\u0435\u043b\u0435\u043d\u0434\u0436\u0438\u043a","ReceptionLaP":"1","DeliveryLaP":"1","Reception":"1","ForeignReceptionReturns":"1","Terminal":"1","Kladr":"2300000300000","Region":"\u041a\u0440\u0430\u0441\u043d\u043e\u0434\u0430\u0440\u0441\u043a\u0438\u0439","CountryCode":"643",.......
``` 

<a name="createOrder"><h1>Создание / Редактирование заказа</h1></a>  
Создание нового заказа в ЛК BB. Заказы бывают двух видов, до ПВЗ и курьерская доставка до двери.
Если заказ в ПВЗ, то адрес доставки заполнять не требуется. 
Подробнее можно [прочитать тут](https://api.boxberry.de/?act=info&sub=api_info_lk), функция ParselCreate.    
  
**Входные параметры:**  
Объект *\WildTuna\BoxberrySdk\Entity\Order*

**Выходные параметры:**  
Ассоциативный массив данных

**Примеры вызова:**
```php
<?php
$bbClient = new \WildTuna\BoxberrySdk\Client();
$bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
$bbClient->setCurrentToken('main'); // Указываем клиенту использовать ключ main для запросов

try {
    $order = new \WildTuna\BoxberrySdk\Entity\Order();
    $order->setTrackNum(TRACK_NUM); // Трекномер заказа в системе BB. Заполняется, если нужно изменить данные заказа
    $order->setDeliveryDate('2019-05-10'); // Дата доставки от +1 день до +5 дней от текущий даты (только для доставки по Москве, МО и Санкт-Петербургу)
    $order->setOrderId('9999999'); // ID заказа в ИМ
    $order->setPalletNum(1); // Номер паллета
    $order->setBarcode('12345678'); // ШК заказа
    $order->setValuatedAmount(1000); // Объявленная стоимость
    $order->setPaymentAmount(1300); // Сумма к оплате
    $order->setDeliveryAmount(300); // Стоимость доставки
    $order->setComment('Тестовый заказ'); // Комментарий к заказу
    // $order->setVid(\WildTuna\BoxberrySdk\Entity\Order::PVZ); // Тип доставки (1 - ПВЗ, 2 - КД, 3 - Почта России)
    // $order->setPvzCode(61831); // Код ПВЗ
    // $order->setPointOfEntry('010'); // Код пункта поступления
    $order->setVid(\WildTuna\BoxberrySdk\Entity\Order::COURIER); // Тип доставки (1 - ПВЗ, 2 - КД, 3 - Почта России)
    
    $customer = new \WildTuna\BoxberrySdk\Entity\Customer();
    $customer->setFio('Иванов Петр Николаевич'); // ФИО получателя
    $customer->setPhone('79995556677'); // Контактный номер телефона
    $customer->setSecondPhone('79995556677'); // Дополнительный номер телефона
    $customer->setEmail('test@test.ru'); // E-mail для оповещений
    
    $customer->setIndex(115551); // Почтовый индекс получателя (не заполянется, если в ПВЗ)
    $customer->setCity('Москва'); // (не заполянется, если в ПВЗ)
    $customer->setAddress('Москва, ул. Маршала Захарова, д. 3а кв. 1'); // Адрес доставки (не заполянется, если в ПВЗ)
    $customer->setTimeFrom('10:00'); // Время доставки от
    $customer->setTimeTo('18:00'); // Время доставки до
    $customer->setTimeFromSecond('10:00'); // Альтернативное время доставки от
    $customer->setTimeToSecond('18:00'); // Альтернативное время доставки до
    $customer->setDeliveryTime('С 10 до 19, за час позвонить'); // Время доставки текстовый формат
    
    // Поля ниже заполняются для организации (не обязательные)
    //$customer->setOrgName('ООО Ромашка'); // Наименование организации
    //$customer->setOrgAddress('123456 Москва, Красная площадь дом 1'); // Арес организации
    //$customer->setOrgInn('7731347089'); // ИНН организации
    //$customer->setOrgKpp('773101001'); // КПП организации
    //$customer->setOrgRs('40702810500036265800'); // РС организации
    //$customer->setOrgKs('30101810400000000225'); // КС банка
    //$customer->setOrgBankName('ПАО Сбербанк'); // Наименование банка
    //$customer->setOrgBankBik('044525225'); // БИК банка
    
    $order->setCustomer($customer);
    
    // Создаем места в заказе
    $place = new \WildTuna\BoxberrySdk\Entity\Place();
    $place->setWeight(1000); // Вес места в граммах
    $place->setBarcode('1234567890'); // ШК места
    $order->setPlaces($place);
    
    // Создаем товары
    $item = new \WildTuna\BoxberrySdk\Entity\Item();
    $item->setId('123124BC'); // ID товара в БД ИМ'
    $item->setName('Тестовый товар 1'); // Название товара
    $item->setAmount(100); // Цена единицы товара
    $item->setQuantity(10); // Количество
    $item->setVat(20); // Ставка НДС
    $item->setUnit('шт'); // Единица измерения
    $order->setItems($item);
    $order->setSenderName('ООО Ромашка'); // Наименование отправителя
    $order->setIssue(\WildTuna\BoxberrySdk\Entity\Order::TOI_DELIVERY_WITH_OPENING_AND_VERIFICATION); // вид выдачи (см. константы класса)

    // Для отправления Почтой России необходимо заполнить дополнительные параметры
    $russianPostParams = new \WildTuna\BoxberrySdk\Entity\RussianPostParams();
    $russianPostParams->setType(\WildTuna\BoxberrySdk\Entity\RussianPostParams::PT_POSILKA); // Тип отправления (см. константы класса)
    $russianPostParams->setFragile(true); // Хрупкая посылка
    $russianPostParams->setStrong(true); // Строгий тип
    $russianPostParams->setOptimize(true); // Оптимизация тарифа
    $russianPostParams->setPackingType(\WildTuna\BoxberrySdk\Entity\RussianPostParams::PACKAGE_IM_MORE_160); // Тип упаковки (см. константы класса)
    $russianPostParams->setPackingStrict(false); // Строгая упаковка

    // Габариты тарного места (см) Обязательны для доставки Почтой России.
    $russianPostParams->setLength(10); 
    $russianPostParams->setWidth(10);
    $russianPostParams->setHeight(10);
    
    $order->setRussianPostParams($russianPostParams);
    $result = $bbClient->createOrder($order);
    
    /*
     array(
       'track'=>'DUD15224387', // Трек-номер BB
       'label'=>'URI' // Ссылка на скачивание PDF файла с этикетками
     );
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
````

<a name="deleteOrderByOrderId"><h1>Удаление/Отзыв заказа по номеру заказа магазина</h1></a>  
Удаление/Отзыв заказа в ЛК BB, если он не проведен в акте.
  
**Входные параметры:**  
 - *order_id (string)* - номер ИМ
 - *cancelType (integer)* - Вариант отмены заказа: 1- удалить посылку, 2- отозвать посылку. Если не передан, то по умолчанию 2 - отменить посылку в ЛК ИМ.

**Выходные параметры:**  
(err) - false запрос успешно выполнен (в ЛК ИМ изменены данные посылки)
      - string сообщение об ошибке, в случае err != false

**Примеры вызова:**
```php
<?php
$bbClient = new \WildTuna\BoxberrySdk\Client();
$bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
$bbClient->setCurrentToken('main'); // Указываем клиенту использовать ключ main для запросов

try {
    $order = new \WildTuna\BoxberrySdk\Entity\Order();
    $result = $bbClient->deleteOrderByOrderId('1056', 1); 
    
    if ($result['err'] === false) {
        // Заказ удален
    } else {
        // Заказ не удален, некорректный ответ сервера BB
    }
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
````

<a name="deleteOrderByTrack"><h1>Удаление/Отзыв заказа по трекномеру</h1></a>  
Удаление/Отзыв заказа в ЛК BB, если он не проведен в акте.

**Входные параметры:**
- *track (string)* - номер ИМ
- *cancelType (integer)* - Вариант отмены заказа: 1- удалить посылку, 2- отозвать посылку. Если не передан, то по умолчанию 2 - отменить посылку в ЛК ИМ.

**Выходные параметры:**  
(err) - false запрос успешно выполнен (в ЛК ИМ изменены данные посылки)
- string сообщение об ошибке, в случае err != false

**Примеры вызова:**
```php
<?php
$bbClient = new \WildTuna\BoxberrySdk\Client();
$bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
$bbClient->setCurrentToken('main'); // Указываем клиенту использовать ключ main для запросов

try {
    $order = new \WildTuna\BoxberrySdk\Entity\Order();
    $result = $bbClient->deleteOrderByTrack('DUD15224387', 1); 
    
    if ($result['err'] === false) {
        // Заказ удален
    } else {
        // Заказ не удален, некорректный ответ сервера BB
    }
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
````
    
<a name="getOrderStatuses"><h1>Статусы заказа</h1></a>  
Возвращает статусы заказа по трек-номеру BB или номеру заказа ИМ.
  
**Входные параметры:**  
 - *order_id (string)* - трек-номер / номер ИМ
 - *all (boolean)* - true - полная информация, false - краткая информация (по умолчанию false)

**Выходные параметры:**  
Ассоциативный массив данных

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
Ассоциативный массив данных

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
Ассоциативный массив данных

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
Ассоциативный массив данных

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

<a name="getLabel"><h1>Этикетка по заказу</h1></a>  
Позволяет получить ссылку на файл печати этикеток по определенной посылке.

**Входные параметры:**  
 - *track (string)* - трек-номер

**Выходные параметры:**  
Ассоциативный массив данных

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $result = $bbClient->getLabel('DUD15086277');
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

<a name="getLabelFile"><h1>Получить файл этикетки</h1></a>  
Позволяет сразу получить файл с этикеткой

**Входные параметры:**
- *track (string)* - трек-номер

**Выходные параметры:**  
Ассоциативный массив данных

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $result = $bbClient->getLabelFile('DUD15086277');
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

<a name="getFileByLink"><h1>Получить файл по ссылке</h1></a>  
Позволяет получить файл по ссылке. Боксберри отдает файлы этикетки, АПП, печатную форму акта, печатную форму акта ТМЦ в виде ссылок на скачивание.
Прямых методов на получение файлов у Боксберри нет, поэтому данный метод позволит обработать все существующие ссылки на печатные версии документов.

**Входные параметры:**
- *link (string)* - ссылка на документ

**Выходные параметры:**  
Ассоциативный массив данных

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $result = $bbClient->getLabelFile('http://api.boxberry.ru/parcel-files/act?upload_id=123');
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

<a name="getOrderInfoByOrderId"><h1>Информация о заказе по номеру заказа магазина</h1></a>  
Позволяет получить информацию о заказе по номеру заказа в магазине.

**Входные параметры:**
- *order_id (string)* - номер заказа в магазине

**Выходные параметры:**  
Ассоциативный массив данных

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $result = $bbClient->getOrderInfoByOrderId('6277');
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

<a name="getAllOrdersInfo"><h1>Получить список заказов по трек номеру или номеру заказа магазина</h1></a>  
Позволяет получить список заказов по трек номерам или номерам заказов в магазине, одним запросом.

**Входные параметры:**
- *$order_ids (array)* - массив трек номеров или номеров заказов магазина
- *$parcel_type (string)* - тип выборки (трек номер посылки или номер заказа магазина), принимает значения 'order_id' или 'track'. По умолчанию 'order_id'

**Выходные параметры:**  
Ассоциативный массив данных

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $orderIds = [26974, 26975, 26980];
    $trackIds = ['A123123121', 'B123123123', 'C123123123'];
    
    $result = $bbClient->getAllOrdersInfo($orderIds, 'order_id');
    $result = $bbClient->getAllOrdersInfo($trackIds, 'track');
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

<a name="getOrderInfoByOrderId"><h1>Информация о заказе по трекномеру</h1></a>  
Позволяет получить информацию о заказе по трекномеру.

**Входные параметры:**
- *track_id (string)* - трекномер

**Выходные параметры:**  
Ассоциативный массив данных

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $result = $bbClient->getOrderInfoByTrack('DUD15086277');
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

<a name="getOrdersNotAct"><h1>Список заказов не добавленных в акт</h1></a>  
Позволяет получить список всех трекинг кодов посылок которые есть в кабинете но не были сформированы в акт.

**Входные параметры:** 
- *$arr (bool)* - true в виде массива, false в виде строки (по умолчанию false)

**Выходные параметры:**  
array|string - массив трек-номеров или строка трек-номеров разделенная запятой

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $tracknums = $bbClient->getOrdersNotAct(); // строкой $tracknums = 'XXXXXX,XXXXXX,XXXXXX';
    
    $tracknums = $bbClient->getOrdersNotAct(true); // массивом
    /*
     array(
         'XXXXXX',
         'XXXXXX',
         'XXXXXX'
     );
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

<a name="createOrdersTransferAct"><h1>Создание акта передачи посылок</h1></a>  
Создание акта передачи посылок в BoxBerry.  
**Внимание!** сервис работает только с заказами созданными через API ЛК.  

**Выходные параметры:**  
Массив трек-номеров заказов
     
**Выходные параметры:**  
Ассоциативный массив данных  

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $tracknums = ['DUD15086277', 'DUD15086278', 'DUD15086279', 'DUD15086280'];
    $result = $bbClient->createOrdersTransferAct($tracknums);
    /*
     Array
     (
        'id' => Номер акта,
        'label' => 'URI',
        'sticker' => 'URI' // Ссылка на этикетки
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

<a name="getActsList"><h1>Список созданных актов передачи посылок</h1></a>  
Позволяет получить список созданных через API актов передачи заказов.  
Если не указывать диапазоны дат, то будет возвращен последний созданный акт.  
**Внимание!** сервис работает только с актами созданными через API ЛК.  

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
    
    $result = $bbClient->getActsList();
    /*
     Array
     (
         [0] => Array
             (
                'track'=>'XXXXXX,XXXXXX,XXXXXX', // список трекинг кодов посылок в акте,
                'label'=>'URI', // ссылка на скачивание акта, если доступна,
                'date'=>'2019.05.07' // дата создания посылки в формате YYYY.MM.DD HH:MM:SS.
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

<a name="getParcelFileActToId"><h1>Получить файл "Акта приема передачи посылки (АПП)" по номеру АПП</h1></a>  
Позволяет получить файл "Акта приема передачи посылки (АПП)" по номеру АПП

**Входные параметры:**
- *$parcelId* - номер АПП

**Выходные параметры:**  
Ассоциативный массив данных

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $result = $bbClient->getParcelFileActToId('12942207');
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

<a name="getParcelFileActTMCToId"><h1>Получить файл акта ТМЦ (если подключена услуга в ЛК) по номеру АПП</h1></a>  
Позволяет получить файл акта ТМЦ (если подключена услуга в ЛК) по номеру АПП

**Входные параметры:**
- *$parcelId* - номер АПП

**Выходные параметры:**  
Ассоциативный массив данных

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $result = $bbClient->getParcelFileActTMCToId('12942207');
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

<a name="getParcelFileBarcodesToId"><h1>Получить печатную форму этикеток по номеру АПП</h1></a>  
Позволяет получить печатную форму этикеток по номеру АПП

**Входные параметры:**
- *$parcelId* - номер АПП

**Выходные параметры:**  
Ассоциативный массив данных

**Примеры вызова:**
```php
<?php

try {
    $bbClient = new \WildTuna\BoxberrySdk\Client();
    $bbClient->setToken('main', 'bb_api_token'); // Заносим токен BB и присваиваем ему ключ main
    $bbClient->setCurrentToken('main');
    
    $result = $bbClient->getParcelFileBarcodesToId('12942207');
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

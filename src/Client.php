<?php

namespace WildTuna\BoxberrySdk;

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
            'base_uri' => 'http://api.boxberry.de/json.php'
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
}
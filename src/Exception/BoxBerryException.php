<?php

namespace WildTuna\BoxberrySdk\Exception;

use Throwable;

class BoxBerryException extends \Exception
{
    /**
     * @var string
     */
    private $raw_response = null;

    /**
     * @var string
     */
    private $raw_request  = null;

    public function __construct($message = "", $code = 0, $raw_response = null, $raw_request = null, Throwable $previous = null)
    {
        $this->raw_request = $raw_request;
        $this->raw_response = $raw_response;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function getRawResponse(): string
    {
        return $this->raw_response;
    }

    /**
     * @param string $raw_response
     */
    public function setRawResponse(string $raw_response): void
    {
        $this->raw_response = $raw_response;
    }

    /**
     * @return string
     */
    public function getRawRequest(): string
    {
        return $this->raw_request;
    }

    /**
     * @param string $raw_request
     */
    public function setRawRequest(string $raw_request): void
    {
        $this->raw_request = $raw_request;
    }
}
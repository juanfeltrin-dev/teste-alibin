<?php


namespace Sdk;


class Credential
{
    /**
     * @var string
     */
    private $clientCode;
    /**
     * @var string
     */
    private $clientKey;

    /**
     * Credential constructor.
     * @param $clientCode
     * @param $clientKey
     */
    public function __construct($clientCode, $clientKey)
    {
        $this->clientCode   = $clientCode;
        $this->clientKey    = $clientKey;
    }

    /**
     * @return string
     */
    public function getClientCode()
    {
        return $this->clientCode;
    }

    /**
     * @return string
     */
    public function getClientKey()
    {
        return $this->clientKey;
    }
}
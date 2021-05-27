<?php

namespace Sdk\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Sdk\Credential;

abstract class AbstractRequest
{
    const METHOD_GET = 'GET';

    /**
     * @var Credential
     */
    private $credential;

    public function __construct(Credential $credential)
    {
        $this->credential = $credential;
    }

    /**
     * @param array $params
     * @return mixed
     */
    protected abstract function execute(array $params);

    /**
     * @param $json
     * @return mixed
     */
    protected abstract function unserialize($json);

    /**
     * @param $method
     * @param $url
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send($method, $url, array $params = [])
    {
        try {
            $client = new Client();

            $response = $client->request($method, $url, [
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Client-Code'   => $this->credential->getClientCode(),
                    'Client-key'    => $this->credential->getClientKey()
                ],
                'query' => $params
            ]);

            return $this->unserialize($response->getBody()->getContents());
        } catch (ClientException $clientException) {
            throw $clientException;
        }
    }
}
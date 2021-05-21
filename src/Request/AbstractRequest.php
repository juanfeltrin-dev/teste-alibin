<?php

namespace Sdk\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

abstract class AbstractRequest
{
    const METHOD_GET = 'GET';

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
                    'Client-Code'   => 'FC-SB-15',
                    'Client-key'    => '6ea297bc5e294666f6738e1d48fa63d2'
                ],
                'query' => $params
            ]);

            return $this->unserialize($response->getBody()->getContents());
        } catch (ClientException $clientException) {
            throw $clientException;
        }
    }
}
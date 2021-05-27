<?php


namespace Sdk\Request;


use Sdk\Credential;
use Sdk\Entity\Venda;

class QueryVenda extends AbstractRequest
{
    public function __construct(Credential $credential)
    {
        parent::__construct($credential);
    }

    /**
     * @param array $params
     * @return Venda[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function execute(array $params = [])
    {
        $url = 'https://api-sandbox.fpay.me/' . 'vendas';

        return $this->send(self::METHOD_GET, $url, $params);
    }

    /**
     * @return Venda[]
     * @throws \Exception
     */
    protected function unserialize($json)
    {
        return Venda::fromJson($json);
    }
}
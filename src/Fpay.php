<?php


namespace Sdk;


use Sdk\Request\QueryVenda;

class Fpay
{
    /**
     * @var Credential
     */
    private $credential;

    /**
     * Fpay constructor.
     * @param Credential $credential
     */
    public function __construct(Credential $credential)
    {
        $this->credential = $credential;
    }

    /**
     * @param array $params
     * @return Entity\Venda[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getVendas(array $params = [])
    {
        $queryVenda = new QueryVenda($this->credential);

        return $queryVenda->execute($params);
    }
}
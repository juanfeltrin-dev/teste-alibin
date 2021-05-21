<?php


namespace App\Request;


use App\Entity\Venda;
use Dotenv\Dotenv;

class QueryVenda extends AbstractRequest
{
    /**
     * @return Venda[]
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
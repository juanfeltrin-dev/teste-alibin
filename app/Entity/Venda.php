<?php


namespace App\Entity;


class Venda
{
    /**
     * @var string
     */
    private $numeroVenda;

    /**
     * @var Cliente
     */
    private $cliente;

    /**
     * @var string
     */
    private $dataVenda;

    /**
     * @var integer
     */
    private $numeroReferencia;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var string
     */
    private $tipoVenda;

    /**
     * @var string
     */
    private $situacao;

    /**
     * @var integer
     */
    private $numeroParcelas;

    /**
     * @var float
     */
    private $valorVenda;

    /**
     * @var Parcela[]
     */
    private $parcelas;

    /**
     * @param $json
     * @return Venda[]
     * @throws \Exception
     */
    public static function fromJson($json)
    {
        $vendas = [];
        $object = json_decode($json);

        if (!$object->success) {
            throw new \Exception("Aconteceu um erro ao consultar as vendas");
        }

        foreach ($object->data as $data) {
            $venda      = new Venda();
            $vendas[]   = $venda->populate($data);
        }

        if (empty($vendas)) {
            throw new \Exception("Nenhuma venda encontrada");
        }

        return $vendas;
    }

    /**
     * @param $data
     * @return $this
     */
    public function populate($data)
    {
        if (isset($data->nm_cliente) && isset($data->nu_documento)) {
            $this->cliente = new Cliente();

            $this->cliente->setNome($data->nm_cliente);
            $this->cliente->setDocumento($data->nu_documento);
        }

        if (isset($data->parcelas) && is_array($data->parcelas)) {
            foreach ($data->parcelas as $dataParcela) {
                $parcela = new Parcela();

                $parcela->populate($dataParcela);

                $this->parcelas[] = $parcela;
            }
        }

        $this->numeroVenda = isset($data->nu_venda) ? $data->nu_venda : null;
        $this->dataVenda = isset($data->dt_venda) ? $data->dt_venda : null;
        $this->numeroReferencia = isset($data->nu_referencia) ? $data->nu_referencia : null;
        $this->tipo = isset($data->tipo) ? $data->tipo : null;
        $this->tipoVenda = isset($data->tipo_venda) ? $data->tipo_venda : null;
        $this->situacao = isset($data->situacao) ? $data->situacao : null;
        $this->numeroParcelas = isset($data->nu_parcelas) ? $data->nu_parcelas : null;
        $this->valorVenda = isset($data->vl_venda) ? $data->vl_venda : null;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumeroVenda()
    {
        return $this->numeroVenda;
    }

    /**
     * @param string $numeroVenda
     */
    public function setNumeroVenda($numeroVenda)
    {
        $this->numeroVenda = $numeroVenda;
    }

    /**
     * @return Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param Cliente $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return string
     */
    public function getDataVenda()
    {
        return $this->dataVenda;
    }

    /**
     * @param string $dataVenda
     */
    public function setDataVenda($dataVenda)
    {
        $this->dataVenda = $dataVenda;
    }

    /**
     * @return int
     */
    public function getNumeroReferencia()
    {
        return $this->numeroReferencia;
    }

    /**
     * @param int $numeroReferencia
     */
    public function setNumeroReferencia($numeroReferencia)
    {
        $this->numeroReferencia = $numeroReferencia;
    }

    /**
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param string $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return string
     */
    public function getTipoVenda()
    {
        return $this->tipoVenda;
    }

    /**
     * @param string $tipoVenda
     */
    public function setTipoVenda($tipoVenda)
    {
        $this->tipoVenda = $tipoVenda;
    }

    /**
     * @return string
     */
    public function getSituacao()
    {
        return $this->situacao;
    }

    /**
     * @param string $situacao
     */
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }

    /**
     * @return int
     */
    public function getNumeroParcelas()
    {
        return $this->numeroParcelas;
    }

    /**
     * @param int $numeroParcelas
     */
    public function setNumeroParcelas($numeroParcelas)
    {
        $this->numeroParcelas = $numeroParcelas;
    }

    /**
     * @return float
     */
    public function getValorVenda()
    {
        return $this->valorVenda;
    }

    /**
     * @param float $valorVenda
     */
    public function setValorVenda($valorVenda)
    {
        $this->valorVenda = $valorVenda;
    }

    /**
     * @return Parcela[]
     */
    public function getParcelas()
    {
        return $this->parcelas;
    }

    /**
     * @param Parcela[] $parcelas
     */
    public function setParcelas($parcelas)
    {
        $this->parcelas = $parcelas;
    }
}
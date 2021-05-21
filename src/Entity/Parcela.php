<?php


namespace Sdk\Entity;


class Parcela
{
    /**
     * @var float
     */
    private $valorParcela;

    /**
     * @var string
     */
    private $dataPagamento;

    /**
     * @var integer
     */
    private $numeroParcela;

    /**
     * @var string
     */
    private $fid;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var integer
     */
    private $referenciaParcela;

    /**
     * @var string
     */
    private $dataCobranca;

    /**
     * @var string
     */
    private $dataVencimento;

    /**
     * @var float
     */
    private $valorTaxa;

    /**
     * @var string
     */
    private $situacao;

    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {
        $this->fid = isset($data->fid) ? $data->fid : null;
        $this->referenciaParcela = isset($data->ref_parcela) ? $data->ref_parcela : null;
        $this->dataCobranca = isset($data->dt_cobranca) ? $data->dt_cobranca : null;
        $this->dataPagamento = isset($data->dt_pagamento) ? $data->dt_pagamento : null;
        $this->dataVencimento = isset($data->dt_vencimento) ? $data->dt_vencimento : null;
        $this->tipo = isset($data->tipo) ? $data->tipo : null;
        $this->situacao = isset($data->situacao) ? $data->situacao : null;
        $this->numeroParcela = isset($data->nu_parcela) ? $data->nu_parcela : null;
        $this->valorParcela = isset($data->vl_parcela) ? $data->vl_parcela : null;
        $this->valorTaxa = isset($data->vl_taxa_fc) ? $data->vl_taxa_fc : null;
    }

    /**
     * @return float
     */
    public function getValorParcela()
    {
        return $this->valorParcela;
    }

    /**
     * @param float $valorParcela
     */
    public function setValorParcela($valorParcela)
    {
        $this->valorParcela = $valorParcela;
    }

    /**
     * @return string
     */
    public function getDataPagamento()
    {
        return $this->dataPagamento;
    }

    /**
     * @param string $dataPagamento
     */
    public function setDataPagamento($dataPagamento)
    {
        $this->dataPagamento = $dataPagamento;
    }

    /**
     * @return int
     */
    public function getNumeroParcela()
    {
        return $this->numeroParcela;
    }

    /**
     * @param int $numeroParcela
     */
    public function setNumeroParcela($numeroParcela)
    {
        $this->numeroParcela = $numeroParcela;
    }

    /**
     * @return string
     */
    public function getFid()
    {
        return $this->fid;
    }

    /**
     * @param string $fid
     */
    public function setFid($fid)
    {
        $this->fid = $fid;
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
     * @return mixed
     */
    public function getReferenciaParcela()
    {
        return $this->referenciaParcela;
    }

    /**
     * @param mixed $referenciaParcela
     */
    public function setReferenciaParcela($referenciaParcela)
    {
        $this->referenciaParcela = $referenciaParcela;
    }

    /**
     * @return mixed
     */
    public function getDataCobranca()
    {
        return $this->dataCobranca;
    }

    /**
     * @param mixed $dataCobranca
     */
    public function setDataCobranca($dataCobranca)
    {
        $this->dataCobranca = $dataCobranca;
    }

    /**
     * @return mixed
     */
    public function getDataVencimento()
    {
        return $this->dataVencimento;
    }

    /**
     * @param mixed $dataVencimento
     */
    public function setDataVencimento($dataVencimento)
    {
        $this->dataVencimento = $dataVencimento;
    }

    /**
     * @return mixed
     */
    public function getValorTaxa()
    {
        return $this->valorTaxa;
    }

    /**
     * @param mixed $valorTaxa
     */
    public function setValorTaxa($valorTaxa)
    {
        $this->valorTaxa = $valorTaxa;
    }

    /**
     * @return mixed
     */
    public function getSituacao()
    {
        return $this->situacao;
    }

    /**
     * @param mixed $situacao
     */
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }

}
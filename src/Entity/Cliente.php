<?php


namespace Sdk\Entity;


class Cliente
{
    /**
     * @var string
     */
    private $nome;

    /**
     * @var integer
     */
    private $documento;

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return int
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * @param int $documento
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }
}
<?php


namespace Tests;

use App\Entity\Venda;
use App\Request\QueryVenda;
use PHPUnit\Framework\TestCase;

class VendaTest extends TestCase
{
    public function testApiVendaSemFiltro()
    {
        $queryVenda = new QueryVenda();

        $this->assertTrue(!empty($queryVenda->execute()));
    }

    public function testApiVendaComFiltro()
    {
        $queryVenda = new QueryVenda();

        $this->assertTrue(!empty($queryVenda->execute(['nu_referencia' => 1621533476])));
    }

    public function testApiVendaComFiltroErrado()
    {
        $queryVenda = new QueryVenda();

        $this->expectException(\Exception::class);

        $queryVenda->execute(['nu_referencia' => 'dsfsdfsdfsfddfssdfsdfsdfdfssdf']);
    }

    public function testConvercaoJsonParaArray()
    {
        $json = '{"success": true,"data":[{"nu_venda":"35293-WGjYY-BUUzR","nm_cliente":"TESTE THALES OTÁVIO ASSIS","nu_documento":"38239189237","dt_venda":"2021-05-20","nu_referencia":"1621533476","tipo":"CREDITO","tipo_venda":"AV","situacao":"ATIVO","nu_parcelas":1,"vl_venda":"1.00","parcelas":[{"fid":"b9d1840d-040f-421e-8c68-b308601f289a","ref_parcela":35066,"dt_cobranca":"2021-05-20","dt_pagamento":"2021-05-20","dt_vencimento":"2021-05-20","tipo":"CREDITO","situacao":"ATIVO","nu_parcela":1,"vl_parcela":"1.00","vl_taxa_fc":"0.04"}]}]}';

        $vendas = Venda::fromJson($json);

        $this->assertTrue(is_array($vendas));
        $this->assertTrue(!empty($vendas));
    }

    public function testConvercaoJsonParaObjetoVenda()
    {
        $json = '{"nu_venda":"35293-WGjYY-BUUzR","nm_cliente":"TESTE THALES OTÁVIO ASSIS","nu_documento":"38239189237","dt_venda":"2021-05-20","nu_referencia":"1621533476","tipo":"CREDITO","tipo_venda":"AV","situacao":"ATIVO","nu_parcelas":1,"vl_venda":"1.00","parcelas":[{"fid":"b9d1840d-040f-421e-8c68-b308601f289a","ref_parcela":35066,"dt_cobranca":"2021-05-20","dt_pagamento":"2021-05-20","dt_vencimento":"2021-05-20","tipo":"CREDITO","situacao":"ATIVO","nu_parcela":1,"vl_parcela":"1.00","vl_taxa_fc":"0.04"}]}';

        $venda = new Venda();

        $this->assertTrue($venda->populate($json) instanceof Venda);
    }
}
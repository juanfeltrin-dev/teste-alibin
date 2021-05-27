<?php
    require 'vendor/autoload.php';

    $credential = new \Sdk\Credential(
        'FC-SB-15',
        '6ea297bc5e294666f6738e1d48fa63d2'
    );

    $fPay = new \Sdk\Fpay($credential);

    $vendas = $fPay->getVendas();

    foreach ($vendas as $venda) {
        echo "Nome: " . $venda->getCliente()->getNome() . "\n";
        echo "Documento: " . $venda->getCliente()->getDocumento() . "\n";

        print_r($venda->getParcelas());
    }

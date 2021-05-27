# Teste Alibin

## Chamar o método
```php
<?php
    require 'vendor/autoload.php';
        
    $credential = new \Sdk\Credential(
        'FC-SB-15',
        '6ea297bc5e294666f6738e1d48fa63d2'
    );

    $fPay = new \Sdk\Fpay($credential);
    
    $fPay->getVendas();
```

## Método execute() aceita um parametro array, que seria os filtros encontrados na [documentação da API](https://docs.fpay.me/#249214b0-0d74-4bfa-a070-fc2b50d0aa21).
```php
<?php
    require 'vendor/autoload.php';
        
    $credential = new \Sdk\Credential(
        'FC-SB-15',
        '6ea297bc5e294666f6738e1d48fa63d2'
    );

    $fPay = new \Sdk\Fpay($credential);
    
    $fPay->getVendas([
        'nu_referencia' => 'REF0001'
    ]);
```

## Chamar o método para obter nome e documento do cliente e as parcelas da venda
```php
<?php
    require 'vendor/autoload.php';
        
    $credential = new \Sdk\Credential(
        'FC-SB-15',
        '6ea297bc5e294666f6738e1d48fa63d2'
    );

    $fPay = new \Sdk\Fpay($credential);
    
    $vendas = $fPay->getVendas();

    foreach ($vendas as $venda) {
        $venda->getCliente()->getNome();
        $venda->getCliente()->getDocumento();
    
        $venda->getParcelas();
    }
```

## Rodar testes
`vendor/bin/phpunit`
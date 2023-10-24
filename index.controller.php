<?php
$clientes = array(
    [
        "Nombre" => "David",
        "Pedidos" => [
            [
                "items" => "grapadora, grapas, bolígrafo.",
                "precio" => 30
            ]
        ],
        "Sub" => true
    ],

    [
        "Nombre" => "Martí",
        "Pedidos" => [
            [
                "items" => "palo de atizar, tizas de colores, cinturón de cocodrilo, sombreo de paja",
                "precio" => 125
            ]
        ],
        "Sub" => false
    ],

    [
        "Nombre" => "Paula",
        "Pedidos" => [
            [
                "items" => "tanque de juguete, mesa, alfombra con dibujo ciudad, M1 Garand",
                "precio" => 420
            ]
        ],
        "Sub" => true
    ],

    [
        "Nombre" => "Sebas",
        "Pedidos" => [
            [
                "items" => "",
                "precio" => 0
            ]
        ],
        "Sub" => true
    ],

    [
        "Nombre" => "Veriun",
        "Pedidos" => [
            [
                "items" => "",
                "precio" => 0
            ]
        ],
        "Sub" => false
    ],
);


// Filtrar clientes que han realizado al menos un pedido
$clientesConPedidos = array_filter($clientes, function ($cliente) {
    return !empty(array_filter($cliente['Pedidos'], function ($pedido) {
        return $pedido['precio'] > 0;
    }));
});

// Calcular el importe total de los pedidos para cada cliente
$clientesConTotalDePedidos = array_map(function ($cliente) {
    $total = array_sum(array_column($cliente['Pedidos'], 'precio'));
    $cliente['TotalPedidos'] = $total;
    return $cliente;
}, $clientesConPedidos);

// Calcular el importe total gastado en la tienda por cada cliente
$clientesConTotalGastado = array_map(function ($cliente) {
    $total = array_sum(array_column($cliente['Pedidos'], 'precio'));
    $cliente['TotalGastado'] = $total;
    return $cliente;
}, $clientes);

// Ordenar el listado de clientes en orden decreciente por el importe gastado
usort($clientesConTotalGastado, function ($a, $b) {
    return $b['TotalGastado'] - $a['TotalGastado'];
});

<?php
$clientes = array(
    [
        "Nombre" => "David",
        "Pedidos" => [
            [
                "items" => "grapadora, grapas, bolígrafo.",
                "precio" => 28
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

//Teoría: array_filter es una función que se utiliza para filtrar los elementos de un array basándose en una función de devolución de llamada (callback).

$clientesConPedidos = array_filter($clientes, function ($cliente) {
    return !empty(array_filter($cliente['Pedidos'], function ($pedido) {
        return $pedido['precio'] > 0;
    }));
});
// Teoría : La función array_map se utiliza para aplicar una función a cada elemento de un array. 
// La función array_sum se utiliza para calcular la suma de los valores en un array. 
// La función array_column se utiliza para extraer una sola columna de valores de un array multidimensional. 
$clientesConTotalDePedidos = array_map(function ($cliente) {
    $total = array_sum(array_column($cliente['Pedidos'], 'precio'));
    $cliente['TotalPedidos'] = $total;
    return $cliente;
}, $clientesConPedidos);

$clientesConTotalGastado = array_map(function ($cliente) {
    $total = array_sum(array_column($cliente['Pedidos'], 'precio'));
    $cliente['TotalGastado'] = $total;
    return $cliente;
}, $clientes);

// Teoría: usort es una función que se utiliza para ordenar un array basado en un algoritmo de comparación personalizado.
usort($clientesConTotalGastado, function ($a, $b) {
    return $b['TotalGastado'] - $a['TotalGastado'];
});


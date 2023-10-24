<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>

<body>

    <h1>Lista de Clientes</h1>
    <h3>Lista ordenada usuarios suscritos:</h3>
    <ol>
        <?php
        include('index.controller.php');
        foreach ($clientes as $cliente) {
            if ($cliente['Sub'] == 0) {
                echo "<li>";
                    echo "<strong>Nombre:</strong> " . $cliente['Nombre'] . "<br>";
                echo "</li>";
            }
        }
        ?>
    </ol>

    <h3>Lista ordenada usuarios no suscritos:</h3>
    <ol>
        <?php
         foreach ($clientes as $cliente) {
            if ($cliente['Sub'] == 1) {
                echo "<li>";
                    echo "<strong>Nombre:</strong> " . $cliente['Nombre'] . "<br>";
                echo "</li>";
            }
        }
        ?>
    </ol>

    <h3>Listado de Clientes que han realizado al menos un pedido</h3>

    <ul>
        <?php
        foreach ($clientesConTotalDePedidos as $cliente) {
            echo "<li>";
            echo "<strong>Nombre:</strong> " . $cliente['Nombre'] . "<br>";
            echo "<strong>Importe Total de Pedidos:</strong> €" . $cliente['TotalPedidos'] . "<br>";
            echo "</li>";
        }
        ?>
    </ul>

</body>

</html>
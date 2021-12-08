<?php

$dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "abc123.");

$resultado = $dwes->query("SELECT producto, unidades FROM stock");

$resultado->bindColumn(1, $producto);

$resultado->bindColumn(2, $unidades);

while ($registro = $resultado->fetch(PDO::FETCH_BOUND)) {

    echo "Producto ".$producto.": ".$unidades."<br />";

}



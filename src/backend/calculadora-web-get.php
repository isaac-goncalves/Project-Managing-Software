<?php
    if (
        !isset($_GET["valor1"]) ||
        !isset($_GET["valor2"]) 
    ) {
        echo "Valores inválidos.";
        return;
    }

    if (
        !is_numeric($_GET["valor1"]) ||
        !is_numeric($_GET["valor2"]) 
    ) {
        echo "Valores não numéricos.";
        return;
    }

    $numero1 = $_GET["valor1"];
    $numero2 = $_GET["valor2"];

    $resultado = $numero1 + $numero2;

    echo "Resultado = " . $resultado;
?>
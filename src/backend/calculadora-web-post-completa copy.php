<?php
    if (
        !isset($_POST["valor1"]) ||
        !isset($_POST["valor2"]) ||
        !isset($_POST["operacao"]) 
    ) {
        echo "Valores inválidos.";
        return;
    }

    $numero1 = $_POST["valor1"];
    $numero2 = $_POST["valor2"];
    $operacao = $_POST["operacao"];

    $resultado = 0;

    if ($operacao == '+') {
        $resultado = $numero1 + $numero2;
    } else if ($operacao == '-') {
        $resultado = $numero1 - $numero2;
    } else if ($operacao == '*') {
        $resultado = $numero1 * $numero2;
    } else if ($operacao == '/') {
        $resultado = $numero1 / $numero2;
    }

    /*switch($operacao) {
        case '+':
            $resultado = $numero1 + $numero2;
            break;
        case '-':
            $resultado = $numero1 - $numero2;
            break;
        case '*':
            $resultado = $numero1 * $numero2;
            break;
        case '/':
            $resultado = $numero1 / $numero2;
            break;
        default:
            echo "erro";
    }*/

    echo "Resultado = " . $resultado;
?>
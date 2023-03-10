<?php
if (
    !isset($_POST["peso"]) ||
    !isset($_POST["altura"])
) {
    echo "Valores inválidos.";
    return;
}

$peso = $_POST["peso"];
$altura = $_POST["altura"];

$alturaSquared = $altura * $altura;

$resultado = $peso / $alturaSquared;

if ($resultado <= 18.5) {
    echo "Abaixo do peso";
    echo "<br>";
} else if ($resultado >= 18.5 && $resultado <= 24.9){
    echo "Peso Ideal";
    echo "<br>";
}
else if ($resultado >= 25 && $resultado <= 29.9){
    echo "Levemente acima do peso";
    echo "<br>";
}
else if ($resultado >= 30 && $resultado <= 34.9){
    echo "Obesidade grau 1";
    echo "<br>";
}
else if ($resultado >= 35 && $resultado <= 39.9){
    echo "Obesidade grau 2";
    echo "<br>";
}
else if ($resultado > 40 ){
    echo "Obesidade grau 3";
    echo "<br>";
}

//     echo "Peso normal";
// } else if ($resultado == 25 - 29.9) {
//     echo "Sobrepeso";
// } else if ($resultado == 30 - 34.9) {
//     echo "Obesidade grau 1";
// } else if ($resultado == 35 - 39.9) {
//     echo "Obesidade grau 2";
// } else if ($resultado >= 40) {
//     echo "Obesidade grau 3";

echo "Resultado = " . $resultado;
?>
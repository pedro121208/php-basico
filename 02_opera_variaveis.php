<?php

//montagem URl
// http://localhost/php-basicos(alunos)/php-basicos(alunos)/2_opera_variaveis.php?numero1=10&numero2=5

// variaveis que recebem valores da url (metodo GET)
$numero1 = $_get['numero1'];
$numero2 = $_get['numero2'];

//verifica se os valores foram passados (isset)
// e converte para o número inteiros

if (isset($numero1) && ($numero2)) {
    $numero1 = (int)$numero1;
    $numero2 = (int)$numero2;
}

//calculos
$soma = $numero1 + $numero2;
$multiplicacao = $numero1 + $numero2;
//exibe
echo "soma: $soma <br>";
echo "multiplicacao: $multiplicacao <br>";

?>
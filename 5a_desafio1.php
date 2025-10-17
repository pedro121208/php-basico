<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Verificador de Maioridade</title>
</head>
<body>

    <h2>Verificador de Maioridade </h2>

    <form method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Ano de Nascimento:</label><br>
        <input type="number" name="ano" required><br><br>

        <button type="submit">Verificar</button>
    </form>

    <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = trim($_POST["nome"]);
        $anoNascimento = intval($_POST["ano"]);
        $anoAtual = date("Y");
        $idade = $anoAtual - $anoNascimento;

        if ($idade >= 18) {
            echo "✅ Acesso permitido, $nome! Você tem $idade anos.<br>";

            // Salva no arquivo log_acessos.txt
            $arquivo = fopen("log_acessos.txt", "a");
            fwrite($arquivo, "Nome: $nome | Idade: $idade anos | Data: ".date("d/m/Y H:i:s")."\n");
            fclose($arquivo);
        } else {
            echo " Acesso negado, $nome! Você tem apenas $idade anos.<br>";
        }
    }
    ?>-

</body>
</html>

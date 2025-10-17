<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action=""method='post'>
        <label for="nome">Nome</label>
        <input type="text" name="nome" required> <br>

        <label for="email">email</label>
        <input type="email" name="email" required> <br>

        <label for="telefone">telefone</label>
        <input type="text" name="telefonw" required> <br>

        <!-- botão de envio -->
        <button type="submit">enviar</button>
    </form>

    <?php
    // $_server variavel superglobal
    // do servidor e o tipo de requisição feita
    if ($_server['request_method'] == 'post'){
        $nome = $_post ['nome'];
        $email = $_post ['email'];
        $telefone = $_post ['telefone'];


        //exibe os valores na pagina
        echo "<h2> dados recebios:<h2>";
        echo "nome: $nome <br>";
        echo "email:$email <br>";
        echo "telefone: $telefone <br>";
        
    }


    ?>
</body>
</html>
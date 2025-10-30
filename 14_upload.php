<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="wiewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem</title>
</head>
<body>
    <form method="post" action="" enctype="multipart/form-data">
        <label for="imagem">Selecione uma imagem:</label>
        <input type="file" name="imagem" accept="image/*" required><br><br>
        <button type="submit">Upload</button>
    </form>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $diretorio_destino = 'uploads/';

        // Cria o diretório se ele não existir
        if (!is_dir($diretorio_destino)) {
            mkdir($diretorio_destino, 0777, true);
        }

        // Obtém o nome do arquivo enviado
        $nome_arquivo = basename($_FILES['imagem']['name']);
        $caminho_completo = $diretorio_destino . $nome_arquivo;

        // Move o arquivo temporário para o diretório de destino
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_completo)) {
            echo "<p> Upload realizado com sucesso!</p>";
            echo "<img src='$caminho_completo' alt='Imagem enviada' style='max-width: 300px; margin-top: 10px;'>";
        } else {
            echo "<p> Erro ao fazer upload do arquivo.</p>";
        }
    }
    ?>
</body>
</html>


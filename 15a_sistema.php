<?php
// Página de login: 15a_sistema.php
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'] ;

    // Verifica se os dados estão corretos (usuário: admin | senha: 123)
    if ($usuario === 'Max Verstappen' && $senha === '123') {
        $_SESSION['usuario'] = $usuario; // Armazena o nome do usuário na sessão
        header('Location: 15b_restrita.php');
        exit;
    } else {
        $erro = "Usuário ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

    <form method="post" action="">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br>

        <button type="submit">Entrar</button>
    </form>

    <?php if (isset($erro)): ?>
        <p style="color: red;"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

</body>
</html>

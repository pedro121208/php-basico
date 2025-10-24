<!-- Passar id via URL -->
<!-- http://localhost/php-basico-out-2024/13_exclusao.php?id=2 -->

<?php
// Conecta ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exercicio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se um ID foi passado via URL para exclusão
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Deleta o registro do cliente com o ID especificado
    $sql = "DELETE FROM clientes WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Cliente excluído com sucesso!</p>";
    } else {
        echo "<p>Erro ao excluir cliente: " . $conn->error . "</p>";
    }
}

// Fecha a conexão
$conn->close();
?>



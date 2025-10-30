<?php
// pagina de logout (15c_logout.php)
session_start();
session_destroy(); //destroi a sessão do usuario
header('location: 15a_sistema.php');
exit();
?>
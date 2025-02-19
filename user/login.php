<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 1);
header('Content-Type: application/json');
require_once('../connection/db.php');
require_once('../functions/functions.php');

if (!empty($_POST) && isset($_POST)) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    
    $pass_verify = loginUsuario($usuario, $senha);

    // echo "<pre>";
    // print_r($pass_verify);
    // echo "</pre>";

    if ($pass_verify['status'] == 'success') {
        $_SESSION['dados_usuario'] = $pass_verify['dados_user'];
        print_r(json_encode($pass_verify));
    } else {
        print_r(json_encode($pass_verify));
    }
} else {
    echo "Nenhum dado recebido";
}

?>
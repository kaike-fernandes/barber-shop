<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
require_once('../connection/db.php');
require_once('../functions/functions.php');

if (!empty($_POST) && isset($_POST)) {

  if ($_POST['tipo'] == 'validar') {

    $email = $_POST['email'];
    $temEmail = validarEmailExiste($email);
    echo json_encode($temEmail);

  } else if ($_POST['tipo'] == 'cadastro') {

    $nome = $_POST['nome_usuario'];
    $email = $_POST['email_usuario'];
    $telefone = $_POST['telefone_usuario'];
    $senha = $_POST['senha_usuario'];

    // CRIA HASH DA SENHA
    $opt = [
      'cost' => 12,
    ];

    $senha_hash = password_hash($senha, PASSWORD_BCRYPT, $opt);

    $res = cadastrarUsuario($nome, $email, $telefone, $senha_hash);
    print_r(json_encode($res));
  }
}
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 1);
header('Content-Type: application/json');
require_once('../connection/db.php');
require_once('../functions/functions.php');
require '../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Dotenv\Dotenv;

if (isset($_POST) && !empty($_POST)) {

    $token = $_POST['token'];
    $nova_senha = $_POST['newSenha'];


    echo "Token: " . $token;
    echo "\n";
    echo "Senha nova: " . $nova_senha;

    $decoded = JWT::decode($token, new Key($key, 'HS256'));

}

?>
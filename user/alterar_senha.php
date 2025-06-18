<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 1);
require_once('../connection/db.php');
require_once('../functions/functions.php');
require '../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Dotenv\Dotenv;

$dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/../');
$dotenv->load();

if (!file_exists('../.env')){
    die('Arquivo .env não encontrado');
} else {
    $key = $_ENV['SECRET_KEY'];
}

if (isset($_POST) && !empty($_POST)) {
    try {
        $token = $_POST['token'];
        $decoded = JWT::decode($token, new Key($key, 'HS256')); // a própria lib já valida se o token ainda é valido ou se ja expirou
        
        $novaSenha = $_POST['newSenha'];
        $opt = [
            'cost' => 12,
        ];

        $novaSenhaHashed = password_hash($novaSenha, PASSWORD_BCRYPT, $opt);
        alterarSenha($decoded->user_id, $novaSenhaHashed);
        echo "Senha alterada com sucesso!";
    } catch (\Firebase\JWT\ExpiredException $expired) {
        http_response_code(401);
        echo "O token expirou, solicite uma nova alteração de senha!";
    }
}

?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 1);
// header('Content-Type: application/json');
require_once('../connection/db.php');
require_once('../functions/functions.php');
require '../vendor/autoload.php';

use Firebase\JWT\JWT;
use Dotenv\Dotenv;

$dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/../');
$dotenv->load();

if (!file_exists('../.env')){
    die('Arquivo .env não encontrado');
} else {
    $SECRET_KEY = $_ENV['SECRET_KEY'];
}

if (!empty($_POST['email']) && isset($_POST['email'])) {
    $email = $_POST['email'];

    $validar_email = validarEmailExiste($email);

    if ($validar_email) {
        // chave secreta para geração do token
        $key = $SECRET_KEY; 

        // consulta pra buscar informações do usuário
        global $pdo;
        $sql = "SELECT * FROM USUARIOS WHERE EMAIL = '$email'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $dados_user = $stmt->fetch(PDO::FETCH_ASSOC);

        // DADOS DO TOKEN
        $PAYLOAD = [
            "exp" => time() + 3600, // Expiração (1 hora)
            "user_id" => $dados_user['ID_USUARIO'],
            "jti" => bin2hex(random_bytes(16))
        ];

        $TOKEN = JWT::encode($PAYLOAD, $SECRET_KEY, 'HS256');
        echo emailRecuperarSenha($email, $TOKEN);
    } else {
        echo "O e-mail informado não está no nosso banco de dados.";
    }
} else {
    echo "Nenhum e-mail recebido!";
}

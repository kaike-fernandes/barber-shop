<?php 
// include composer
require '../vendor/autoload.php';
use Dotenv\Dotenv;

// pegar variaveis de ambiente
$dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/../');
$dotenv->load();

if (!file_exists('../.env')) {
    die('Arquivo .env não encontrado!');
} else {
    $hostname = $_ENV['HOSTNAME'];
    $db = $_ENV['DATABASE'];
    $user = $_ENV['USER'];
    $pass = $_ENV['PASS'];
    $charset = 'utf8mb4';
}

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$dsn = "mysql:host=$hostname;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $err) {
    throw new PDOException($err->getMessage(), (int)$err->getCode());
}

?>
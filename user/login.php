<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 1);

if (!empty($_POST) && isset($_POST)) {
    $data = $_POST;
    echo "<pre>";
    print_r($data);
    echo "<pre>";
} else {
    echo "Nenhum dado recebido";
}

?>
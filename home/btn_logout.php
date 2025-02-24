<?php

require_once('../connection/db.php');

if (!isset($_SESSION)) {
    session_start();
    echo "sem sessao";
}

$_SESSION = [];

session_destroy();
?>

<script>
    window.location.assign("../index.php?logout=Deslogado com sucesso!")
</script>;
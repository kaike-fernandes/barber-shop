<?php

session_start();
// session_destroy();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 1);

// echo "<pre>";
// print_r($_SESSION['dados_usuario']);
// echo "</pre>";

if (empty($_SESSION['dados_usuario']) && !isset($_SESSION['dados_usuario'])) {
    header("Location: ../index.php?login=Usuário não está logado ou sessão expirou!");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <title>Bem-vindo</title>
</head>

<body>
    <header>
        <nav class="navbar bg-body-dark">
            <div class="container-fluid">
                <div class="logo-home">
                    <a class="navbar-brand" href="#">
                        <img class="" src="../assets/img/hairstyle.png" alt="Logo The Gentleman´s Place" width="48" height="48">
                        Bootstrap
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- side bar -->
        <aside class="sidebar">
            <div class="box-sidebar">
                <div class="icon-hamburguer">
                    <i class="bi bi-list"></i>
                </div>
            </div>
        </aside>

        <!-- content -->
        <section class="content">
            <div class="container">
                <div class="title-home">
                    <h1>Olá, <?= $_SESSION['dados_usuario']['nome'] ?>, seja bem vindo a The Gentleman´s Place</h1>
                </div>
                <div>
                    <?php
                    if (!empty($_SESSION['dados_user']) && isset($_SESSION['dados_user'])) { ?>
                        <h6>
                            <?php print_r($_SESSION['dados_usuario']); ?>
                        </h6>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>footer teste</p>
    </footer>
</body>

</html>
<script src="../js/home.js"></script>
<script src="../js/script.js"></script>
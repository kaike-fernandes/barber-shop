<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Erro</title>
</head>
<style>

    @font-face {
        font-family: 'Cinzel Bold';
        src: url(../assets/fonts/Cinzel_Decorative/CinzelDecorative-Bold.ttf);
    }

    @font-face {
        font-family: 'Cinzel Regular';
        src: url(../assets/fonts/Cinzel_Decorative/CinzelDecorative-Regular.ttf);
    }

    body {
        background-color: #f5f5f5;
    }

    .container-fluid {
        height: 100vh;
        display: grid;
        justify-content: center;
    }

    .box-error {
        background-color: #fff;
        width: 400px;
        height: 200px;
        margin: auto;
        padding: 10px;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    .icon-error {
        text-align: center;
        font-size: larger;
        color: #ec5353;
    }

    .title-error {
        text-align: center;
        font-size: xx-large;
        color: #ec5353;
        font-family: 'Cinzel Bold';
    }

    .message-error {
        text-align: center;
        font-size: large;
        font-family: 'Cinzel Regular';
    }
</style>

<?php

if (!empty($_GET['message']) && isset($_GET['message'])) {
    $message = $_GET['message'];
}

?>

<body>
    <div class="container-fluid">
        <div class="box-error">
            <div class="icon-error">
                <i class="bi bi-exclamation-triangle-fill"></i>
            </div>
            <div class="title-error">
                <p>Error 404</p>
            </div>
            <div class="message-error">
                <p><?php echo ($message) ? $message : 'Página não encontrada!' ?></p>
            </div>
        </div>
    </div>
</body>

</html>
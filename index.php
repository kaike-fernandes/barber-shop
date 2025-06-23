<?php
session_start();
session_unset();
session_destroy();
$_SESSION = [];
error_reporting(E_ALL);
require_once('_ACCESS/config.php');

if (!defined('INTERNAL_ACCESS')) {
  header("Location: _ERROR_PAGE/error.php?message=Você não possui acesso a essa página!");
}
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastro</title>
<link rel="shortcut icon" href="assets/img/hairstyle.png" type="image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<div class="container">

  <div class="box-text">
    <div class="row">
      <div class="col">
        <div class="titleLogin">
          <span class="spanTitleLogin">
            Bem-vindo à The Gentleman’s Place!
          </span>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="textLogin">
          <span class="spanTextLogin">
            Acesse sua conta ou cadastre-se para agendar cortes, cuidar do seu estilo e viver uma experiência única.<br>
          </span>
          <span class="spanTextLogin">
            🚀 Sua transformação começa aqui!
          </span>
        </div>
      </div>
    </div>
  </div>



  <div class="box-form">
    <div id="form-login" class="form-control">
      <div class="box-login">
        <div class="form-group">
          <div class="row">
            <div class="col">
              <label for="">Login:</label>
              <input type="text" id="userLogin" placeholder="Informe seu e-mail" class="form-control">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col">
              <label for="">Senha:</label>
              <div class="input-group">
                <input type="password" class="form-control" id="passwordLogin" placeholder="Digite sua senha" maxlength="8">
                <button type="button" class="btn btn-dark" id="toggle_senha_login" onclick="visualizarSenha(this.querySelector('i').id, $(`#passwordLogin`).attr('id'))">
                  <i class="bi bi-eye-slash-fill" id="olho_senha_login"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <div class="btnLogin">
                <button type="buttom" id="btnLogin" class="btn btn-dark btn_login">Login</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="box-account">
        <div class="row">
          <div class="col text-center">
            <span class="forgot-pass" id="forgotPass">Esqueci a senha?</span>
          </div>
          <div class="col text-center p-0 m-0">
            <b>|</b>
          </div>
          <div class="col text-center p-0 m-0">
            <span class="add-account" id="addAccount">Criar conta </span><i class="bi bi-person-add"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('modal/modal_cadastro.php');
include('modal/modal_recuperar_senha.php');
include('modal/modal_alterar_senha.php');
include('modal/modal_loading.php');
?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
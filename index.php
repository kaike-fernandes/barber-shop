<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastro</title>
<link rel="shortcut icon" href="assets/img/hairstyle.png" type="image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="css/home.css">
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
          <span class="spantextLogin">
            Acesse sua conta ou cadastre-se para agendar cortes, cuidar do seu estilo e viver uma experiência única.<br>
          </span>
          <span class="spantextLogin">
            🚀 Sua transformação começa aqui!
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<div class="box-form">
  <form id="form-login" class="form-control">

    <div class="box-login">
      <div class="form-title" style="text-align: center; margin-bottom: 10px;">
        <div class="row">
          <div class="col">
            <i class="bi bi-scissors"></i>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col">
            <label for="">Login:</label>
            <input type="text" id="userLogin" class="form-control">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col">
            <label for="">Senha:</label>
            <input type="text" id="passwordLogin" class="form-control">
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
          <span class="forgot-pass">Esqueci a senha?</span>
        </div>
        <div class="col text-center p-0 m-0">
          <b>|</b>
        </div>
        <div class="col text-center p-0 m-0">
          <span class="add-account" id="addAccount">Criar conta </span><i class="bi bi-person-add"></i>
        </div>
      </div>
    </div>

  </form>
</div>
</div>


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="staticModalCadastro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastro de Usuário</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="boxModal">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="nome_user">Informe seu nome:</label>
                <input type="text" class="form-control" id="nome_user" placeholder="Nome completo">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="cpf_user">Informe seu CPF:</label>
                <input type="text" maxlength="14" class="form-control" id="cpf_user" placeholder="XXX.XXX.XXX-XX">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="email_user">Informe seu e-mail:</label>
                <input type="email" class="form-control" id="email_user" placeholder="seuemail@gmail.com">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="telefone_user">Informe seu telefone:</label>
                <input type="tel" class="form-control" id="telefone_user" placeholder="(XX) XXXXX-XXXX">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="email_user">Senha:</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="senha_user" placeholder="Digite sua senha" maxlength="8">
                  <button type="button" class="btn btn-dark" id="toggle_senha" onclick="visualizarSenha(this.querySelector('i').id, $(`#senha_user`).attr('id'))">
                    <i class="bi bi-eye-slash-fill" id="olho_senha"></i>
                  </button>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="telefone_user">Confirme sua senha:</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="confirma_senha_user" placeholder="Confirme sua senha" maxlength="8">
                  <button type="button" class="btn btn-dark" id="toggle_confirm_senha" onclick="visualizarSenha(this.querySelector('i').id, $(`#confirma_senha_user`).attr('id'))">
                    <i class="bi bi-eye-slash-fill" id="olho_confirma_senha"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" id="cadastro_usuario" class="btn btn-primary">Confirmar Cadastro</button>
      </div>
    </div>
  </div>

  <!-- TOAST BOOTSTRAP -->
  <div class="toast align-items-center text-bg-warning border-0" id="toastHome" role="alert" aria-live="assertive" aria-atomic="true" style="margin-left: 30px;">
    <div class="d-flex">
      <div class="toast-body">
        <span class="text-toast" id="text_toast"></span>
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../css/home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
  <!-- NAVBAR
  <nav class="navbar bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">
        <i class="bi bi-scissors"></i>
        Bootstrap
      </a>
    </div>
  </nav> -->

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
    <form action="#" id="form-login" class="form-control">

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
                  <input type="text" class="form-control" id="nome_user">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="email_user">Informe seu e-mail:</label>
                  <input type="email" class="form-control" id="email_user">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="telefone_user">Informe seu telefone:</label>
                  <input type="text" class="form-control" id="telefone_user">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="email_user">Senha:</label>
                  <input type="password" class="form-control" id="senha_user">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="telefone_user">Confirme sua senha:</label>
                  <input type="password" class="form-control" id="confirma_senha_user">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Confirmar Cadastro</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

<script>
  $(document).ready(function() {

    $(`#btnLogin`).on('click', function(event) {
      event.preventDefault();

      let user = $(`#userLogin`).val();
      let pass = $(`#passwordLogin`).val();

      console.log(user);
      console.log(pass);

      $.ajax({
        type: "POST",
        url: "login.php",
        cache: false,
        data: {
          usuario: user,
          senha: pass
        },

        success: function(data) {
          console.log("Dados enviados!")
        },

        error: function(error) {
          console.log("Não enviou nada.");
        }
      })
    })

    $(`#addAccount`).on('click', function() {
      $(`#staticModalCadastro`).modal('show');
    })

  });
</script>
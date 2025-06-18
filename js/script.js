// MÁSCARAS
$(`#telefone_user`).mask("(99) 99999-9999");

$(`.box-text`).hide();
$(`.box-form`).hide();

$(document).ready(function () {
  let img = new Image();
  img.src = $('body').css('background-image').replace(/url\(["']?(.*?)["']?\)/, '$1'); // Extrai a URL da imagem no CSS

  img.onload = function () {
    $('.box-text, .box-form').slideDown(1000); // Exibe os elementos suavemente após a imagem carregar
  };
})

// MODAL RECUPERAR SENHA
$(document).ready(function () {
  const url = new URLSearchParams(window.location.search);
  const token = url.get("token");

  if(token) {
    $(`#staticModalAlterarSenha`).modal('show');

    $('#alterar_senha').on('click', function () {
      let newSenha = $('#new_senha').val();
      $.ajax({
        type: "POST",
        url: "./user/alterar_senha.php",
        cache: false,
        data: {
          token: token,
          newSenha: newSenha,
        },

        beforeSend: () => {
          $('#new_senha').val("");
          $('#confirm_new_senha').val("");
          $('#loadingModal').toggleClass('d-flex d-none');
        },

        success: function (data) {
          console.log('Enviado com sucesso' + data);
          exibirToast(data, 'success');
        },

        error: function (data) {
          exibirToast(data.responseText, 'danger');
        },

        complete: () => {
          $('#staticModalRecuSenha').modal('hide');
          $('#loadingModal').toggleClass('d-none d-flex');
        }
      });
    });
    
  }
})

// LOGIN MESSAGE
$(document).ready(function () {
  const url = new URLSearchParams(window.location.search);
  const login = url.get("login");

  if (login) {
    exibirToast(login, 'danger');
  }
});

// LOGOUT MESSAGE
$(document).ready(function () {
  const url = new URLSearchParams(window.location.search);
  const login = url.get("logout");

  if (login) {
    exibirToast(login, 'warning');
  }
});

// LOGIN USER
$(document).ready(function () {
  $(`#btnLogin`).on("click", function (event) {
    event.preventDefault();

    let user = $(`#userLogin`).val();
    let pass = $(`#passwordLogin`).val();

    if (user == "" || pass == "") {
      exibirToast("Preencha todos os campos para fazer login.", 'warning');
      return;
    }

    console.log(user);
    console.log(pass);

    $.ajax({
      type: "POST",
      url: "./user/login.php",
      cache: false,
      data: {
        usuario: user,
        senha: pass,
      },

      beforeSend: function () {
        $(`#userLogin`).val("");
        $(`#passwordLogin`).val("");
      },

      success: function (data) {
        console.log(data);

        if (data.status == "success") {
          exibirToast(data.message, 'success');
          setTimeout(() => {
            window.location.href = "./home/home.php";
          }, 2000);
        } else {
          exibirToast(data.message, 'danger');
        }
      },

      error: function (error) {
        exibirToast("Algo deu errado, por favor entre em contato com o administrador!", 'danger');
      },
    });
  });
});

function limpaModalCadastro() {
  $(`#nome_user`).val("");
  $(`#email_user`).val("");
  $(`#telefone_user`).val("");
  $(`#senha_user`).val("");
  $(`#confirma_senha_user`).val("");
}

// CADASTRO USER
$(`#addAccount`).on("click", function () {
  $(`#staticModalCadastro`).modal("show");
});
$(document).ready(function () {
  $(`#cadastro_usuario`).on("click", function () {
    let nome = $(`#nome_user`).val();
    let email = $(`#email_user`).val();
    let telefone = $(`#telefone_user`).val();
    let senha = $(`#senha_user`).val();
    let confirm_senha = $(`#confirma_senha_user`).val();

    if (
      nome == "" ||
      email == "" ||
      telefone == "" ||
      senha == "" ||
      confirm_senha == ""
    ) {
      exibirToast("Preencha todos os campos para se cadastrar.", 'warning');
      return;
    }

    if (senha != confirm_senha) {
      exibirToast("As senhas informadas não são iguais.", 'danger');
      return;
    } else {
      $.ajax({
        type: "POST",
        url: "./user/cadastro.php",
        cache: false,
        data: {
          email: email,
          tipo: "validar",
        },

        success: function (data) {
          if (data == true) {
            exibirToast(
              "Esse email já foi cadastrado, insira outro.", 'danger');
            return;
          } else {
            $.ajax({
              type: "POST",
              url: "./user/cadastro.php",
              cache: false,
              data: {
                nome_usuario: nome,
                email_usuario: email,
                telefone_usuario: telefone,
                senha_usuario: senha,
                tipo: "cadastro",
              },

              success: function (data) {
                exibirToast(data.message, 'success');
              },

              complete: function () {
                $(`#nome_user`).val("");
                $(`#email_user`).val("");
                $(`#telefone_user`).val("");
                $(`#senha_user`).val("");
                $(`#confirma_senha_user`).val("");

                $(`#staticModalCadastro`).modal("hide");
              },

              error: function (erro) {
                exibirToast("Algo deu errado", 'danger');
              },
            });
          }
        },

        error: function (erro) {
          exibirToast("Algo deu errado", 'danger');
        },
      });
    }
  });
});

// RECUPERAR SENHA USER
$(`#forgotPass`).on("click", function () {
  $(`#staticModalRecuSenha`).modal("show");
});

$(document).ready(function () {
  $(`#recu_senha`).on('click', function () {
    
    let email = $(`#email_rec_senha`).val();

    if ((!email) || (email == "") || (email == null)) {
      exibirToast("Preencha seu e-mail, sem ele não podemos te enviar o link para recuperar sua senha!", 'warning');
      return;
    }

    $.ajax({
      type: "POST",
        url: "./user/recu_senha.php",
        cache: false,
        data: {
         "email": email,
        },

        beforeSend: () => {
          $('#email_rec_senha').val("");
          $('#loadingModal').toggleClass('d-flex d-none');
        },

        success: function (data) {
          console.log(data);
          if (data) {
            exibirToast(data, 'success');
          }
        },

        complete: () => {
          $('#staticModalRecuSenha').modal('hide');
          $('#loadingModal').toggleClass('d-none d-flex');
        }
    })

  })
})

// func para visualizar senha campo de cadastro
function visualizarSenha(idIcon, idInput) {
  const icon = idIcon;
  const input = idInput;
  const inputType = $(`#` + input).attr("type");

  if (inputType === "password") {
    $(`#` + input).attr("type", "text");
    $(`#` + icon).removeClass("bi bi-eye-slash-fill");
    $(`#` + icon).addClass("bi bi-eye-slash");
  } else {
    $(`#` + input).attr("type", "password");
    $(`#` + icon).removeClass("bi bi-eye-slash");
    $(`#` + icon).addClass("bi bi-eye-slash-fill");
  }
}

// function padrão para chamar toast
function exibirToast(message, type, textColor = null) {

  switch (type) {
    case 'success':
      bgColor = "#469536";
      break;
    case 'warning':
      bgColor = "#FFCC00";
      break;
    case 'danger':
      bgColor = "#dd5035";
      break;
  
    default:
      color = '#469536';
      break;
  }

  Toastify({
    text: message,
    duration: 2000,
    // destination: "https://github.com/apvarun/toastify-js",
    // newWindow: true,
    close: true,
    gravity: "bottom", // `top` or `bottom`
    position: "left", // `left`, `center` or `right`
    // stopOnFocus: true, // Prevents dismissing of toast on hover
    style: {
      background: bgColor,
      color: '#fff',
    },
    // onClick: function(){} // Callback after click
  }).showToast();
}

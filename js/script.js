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

        success: function (data) {
          console.log('Enviado com sucesso' + data);
        },

        error: function () {
          exibirToast("Algo deu errado, entre em contato com o administrador.", '#7a1b0c', '#fff')
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
    exibirToast(login, "#7a1b0c", "#fff");
  }
});

// LOGOUT MESSAGE
$(document).ready(function () {
  const url = new URLSearchParams(window.location.search);
  const login = url.get("logout");

  if (login) {
    exibirToast(login, "#FFB700");
  }
});

// LOGIN USER
$(document).ready(function () {
  $(`#btnLogin`).on("click", function (event) {
    event.preventDefault();

    let user = $(`#userLogin`).val();
    let pass = $(`#passwordLogin`).val();

    if (user == "" || pass == "") {
      exibirToast("Preencha todos os campos para fazer login.", "#FFCC00", "#000", "#000", "#FFF");
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
          exibirToast(data.message, "#99CC33");
          setTimeout(() => {
            window.location.href = "./home/home.php";
          }, 2000);
        } else {
          exibirToast(data.message, "#7a1b0c", "#fff");
        }
      },

      error: function (error) {
        exibirToast(
          "Algo deu errado, por favor entre em contato com o administrador!",
          "#7a1b0c", "#fff"
        );
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
      exibirToast("Preencha todos os campos para se cadastrar.", "#FFCC00", "#000");
      return;
    }

    if (senha != confirm_senha) {
      exibirToast("As senhas informadas não são iguais.", "#7a1b0c", "#fff");
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
              "Esse email já foi cadastrado, insira outro.",
              "#7a1b0c", "#fff"
            );
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
                exibirToast(data.message, "#99CC33");
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
                exibirToast("Algo deu errado", "#7a1b0c", "#fff");
              },
            });
          }
        },

        error: function (erro) {
          exibirToast("Algo deu errado", "#7a1b0c", "#fff");
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
      exibirToast("Preencha seu e-mail, sem ele não podemos te enviar o link para recuperar sua senha!", "#FFCC00", "#FFF");
      return;
    }

    $.ajax({
      type: "POST",
        url: "./user/recu_senha.php",
        cache: false,
        data: {
         "email": email,
        },

        success: function (data) {
          console.log(data);
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
function exibirToast(message, color, textColor = null) {
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
      background: color,
      color: textColor,
      fontWeight: "bold",
    },
    // onClick: function(){} // Callback after click
  }).showToast();
}

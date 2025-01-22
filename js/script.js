// MÁSCARAS
$(`#cpf_user`).mask("999.999.999-99");
$(`#telefone_user`).mask("(99) 99999-9999");

// LOGIN USER
$(document).ready(function (){
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
    });
});

function limpaModalCadastro() {
    $(`#nome_user`).val("");
    $(`#cpf_user`).val("");
    $(`#email_user`).val("");
    $(`#telefone_user`).val("");
    $(`#senha_user`).val("");
    $(`#confirma_senha_user`).val("");
}

// CADASTRO USER
$(`#addAccount`).on('click', function() {
    $(`#staticModalCadastro`).modal('show');
})
$(document).ready(function () {
    $(`#cadastro_usuario`).on('click', function() {
    
        let nome = $(`#nome_user`).val();
        let cpf = $(`#cpf_user`).val();
        let email = $(`#email_user`).val();
        let telefone = $(`#telefone_user`).val();
        let senha = $(`#senha_user`).val();
        let confirm_senha = $(`#confirma_senha_user`).val();

        if (nome == "" || cpf == "" || email == "" || telefone == "") {
            exibirToast("Preencha todos os campos para se cadastrar.", '#FFCC00');
            return;
        };
    

        if (senha != confirm_senha) {
            exibirToast('As senhas informadas não são iguais.', '#FFCC00')
            return;
        } else {
            $.ajax({
                type: 'POST',
                url: './user/cadastro.php',
                cache: false,
                data: {
                    nome_usuario: nome,
                    cpf_usuario: cpf,
                    email_usuario: email,
                    telefone_usuario: telefone,
                    senha_usuario: senha,
                },
    
                success: function(data) {
                    exibirToast(data.message, '#99CC33')
                },
    
                complete: function() {
    
                    $(`#nome_user`).val("");
                    $(`#cpf_user`).val("");
                    $(`#email_user`).val("");
                    $(`#telefone_user`).val("");
                    $(`#senha_user`).val("");
                    $(`#confirma_senha_user`).val("");

                    $(`#staticModalCadastro`).modal('hide');                    
                },
    
                error: function(erro) {
                    exibirToast("Algo deu errado", '#CC3300')
                }
            })
        }
    });
});


// RECUPERAR SENHA USER
$(`#forgotPass`).on('click', function () {
    $(`#staticModalRecuSenha`).modal('show');
});



// func para visualizar senha campo de cadastro
function visualizarSenha(idIcon, idInput) {

    const icon = idIcon;
    const input = idInput;
    const inputType = $(`#` + input).attr('type');

    if (inputType === 'password') {
        $(`#` + input).attr('type', 'text');
        $(`#` + icon).removeClass("bi bi-eye-slash-fill");
        $(`#` + icon).addClass("bi bi-eye-slash");
    } else {
        $(`#` + input).attr('type', 'password');
        $(`#` + icon).removeClass("bi bi-eye-slash");
        $(`#` + icon).addClass("bi bi-eye-slash-fill");
    }
};


function exibirToast(message, color) {
    Toastify({
        text: message,
        duration: 3000,
        // destination: "https://github.com/apvarun/toastify-js",
        // newWindow: true,
        close: true,
        gravity: "bottom", // `top` or `bottom`
        position: "left", // `left`, `center` or `right`
        // stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: color,
        },
        // onClick: function(){} // Callback after click
      }).showToast();
}

// VALIDA CPF
function validarCpf(token, cpf, idInput) {

    $.ajax({
        url: 'https://api.invertexto.com/v1/validator',
        method: 'GET',
        data: {
            token: token,
            value: cpf,
            type: 'cpf',
        },

        success: function(data) {
            if (data.valid) {
                console.log('CPF é válido!');
                $(`#` + idInput).addClass('is-valid')

            } else {
                console.log('CPF é inválido.');
                $(`#` + idInput).addClass('is-invalid')
            }
        },

        complete: function () {
            setTimeout(function () {
                $(`#` + idInput).removeClass('is-valid')
                $(`#` + idInput).removeClass('is-invalid')
            }, 3000)
        },

        error: function(error) {
            console.error('Erro na requisição:', error);
        }
    })
}
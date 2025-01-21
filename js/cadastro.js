// MÁSCARAS
$(`#cpf_user`).mask("999.999.999-99");
$(`#telefone_user`).mask("(99) 99999-9999");


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
    
        const toast = $(`#toastHome`);
    
        if (senha != confirm_senha) {
            exibirToast('As senhas informadas não são iguais.', '#FFCC00')
            return;
        } else {
            $.ajax({
                type: 'POST',
                url: 'cadastro.php',
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
                    console.log("algo deu errado");
                }
            })
        }
    });
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
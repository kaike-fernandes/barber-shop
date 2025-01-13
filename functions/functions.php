<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

function cadastrarUsuario($nome, $cpf, $email, $telefone, $senha)
{

    global $pdo;

    try {
        $sql = "INSERT INTO 
                usuarios (
                    NOME, 
                    CPF, 
                    EMAIL, 
                    TELEFONE, 
                    SENHA, 
                    DATA_CADASTRO
                ) VALUES (
                    :nome_usuario, 
                    :cpf_usuario, 
                    :email_usuario, 
                    :telefone_usuario, 
                    :senha_usuario,
                    NOW()
                )";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome_usuario', $nome);
        $stmt->bindParam(':cpf_usuario', $cpf);
        $stmt->bindParam(':email_usuario', $email);
        $stmt->bindParam(':telefone_usuario', $telefone);
        $stmt->bindParam(':senha_usuario', $senha);

        // echo $sql;
        $res = $stmt->execute();

        if ($res) {
            $return = ["status" => "success", "message" => "Usuário cadastrado com sucesso!"];
            return $return;
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

function cadastrarUsuario($nome, $email, $telefone, $senha)
{

    global $pdo;

    try {
        $sql = "INSERT INTO 
                usuarios (
                    NOME,
                    EMAIL, 
                    TELEFONE, 
                    SENHA, 
                    DATA_CADASTRO
                ) VALUES (
                    :nome_usuario, 
                    :email_usuario, 
                    :telefone_usuario, 
                    :senha_usuario,
                    NOW()
                )";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome_usuario', $nome);
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


function validarEmailExiste($email)
{

    global $pdo;

    $sql = "SELECT EMAIL FROM usuarios WHERE EMAIL = :email";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);

    $res = $stmt->execute();
    
    if ($res) {
        $returnArray = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $returnArray[] = $row;
        }
    }

    if (count($returnArray) > 0) {
        return true;
    } else {
        return false;
    }
}

function loginUsuario($email, $senha) {

    global $pdo;

    try {

        $sql = "SELECT 
                    * 
                FROM 
                    usuarios 
                WHERE
                    EMAIL = :email";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($senha, $user['SENHA'])) {
            $dados_user = [
                "id" => $user['ID_USUARIO'],
                "nome" => $user['NOME'],
                "email" => $user['EMAIL'],
                "telefone" => $user['TELEFONE'],
            ];

            $return = [
                "status" => "success", 
                "message" => "Usuário logado com sucesso!",
                "dados_user" => $dados_user, 
            ];
            
            return $return;
        } else {
            $return = ["status" => "error", "message" => "Usuário ou senha inválidos!"];
            return $return;
        }

    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

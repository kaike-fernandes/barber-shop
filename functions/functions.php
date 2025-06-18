<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function cadastrarUsuario($nome, $email, $telefone, $senha)
{

    global $pdo;

    try {
        $sql = "INSERT INTO 
                USUARIOS (
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

    $sql = "SELECT EMAIL FROM USUARIOS WHERE EMAIL = :email";

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

function loginUsuario($email, $senha)
{

    global $pdo;

    try {

        $sql = "SELECT 
                    * 
                FROM 
                    USUARIOS 
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


function listarAbas()
{

    global $pdo;

    
    try {
        $sql = "SELECT * FROM ICONS_ABAS WHERE IC_ATIVO = 'S'";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $returnArray = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $returnArray[$row['ID_IC_ABAS']] = $row;
        }
        return $returnArray;
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
}

function emailRecuperarSenha($email, $TOKEN)
{

    require '../vendor/autoload.php'; // Certifique-se de que o PHPMailer foi instalado

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    try {
        // Configuração do servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Servidor SMTP (troque se necessário)
        $mail->SMTPAuth   = true;
        $mail->Username   = 'kaike.jacone@gmail.com'; // Seu e-mail SMTP
        $mail->Password   = 'szzr olus ihdf uqed'; // Sua senha (use App Password se for Gmail)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // TLS recomendado
        $mail->Port       = 587; // Porta padrão para TLS

        // Configuração do e-mail
        $mail->setFrom('kaike.jacone@gmail.com', 'The Glantemens Place'); // Remetente
        $mail->addReplyTo('kaike.jacone@gmail.com', 'The Glantemens Place'); // Remetente
        $mail->addAddress($email, 'aaaaa'); // Destinatário

        $mail->addEmbeddedImage('../assets/img/hairstyle.png', 'logoCid'); // 'logoCid' é o Content-ID usado no HTML

        $mail->isHTML(true); // Habilitar HTML
        $mail->Subject = 'Recupere sua senha – The Glantemens Place';
        $mail->Body    = "
                        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: auto; padding: 20px; border: 1px solid #e0e0e0; border-radius: 8px;'>
                            <div style='text-align: center; margin-bottom: 20px;'>
                                <img src='cid:logoCid' alt='The Glantemens Place' style='max-width: 60px;'>
                            </div>
                            <h2 style='color: #333;'>Esqueceu sua senha?</h2>
                            <p style='font-size: 16px; color: #555;'>
                                Fica tranquilo(a), isso acontece!
                            </p>
                            <p style='font-size: 16px; color: #555;'>
                                Recebemos uma solicitação para redefinir a senha da sua conta na <strong>The Glantemens Place</strong>.
                            </p>
                            <p style='font-size: 16px; color: #555;'>
                                É só clicar no botão abaixo para criar uma nova senha:
                            </p>
                            <p style='text-align: center; margin: 30px 0;'>
                                <a href='http://localhost/barber-shop/index.php?token=$TOKEN'
                                style='background-color: #000; color: white; text-decoration: none; padding: 12px 24px; border-radius: 6px; font-weight: bold; display: inline-block;'>
                                Redefinir minha senha
                                </a>
                            </p>
                            <p style='font-size: 14px; color: #999;'>
                                Se você não pediu isso, pode ignorar este e-mail. Está tudo certo 😉
                            </p>
                            <hr style='margin-top: 30px; border: none; border-top: 1px solid #eee;' />
                            <p style='font-size: 12px; color: #aaa; text-align: center;'>
                                The Glantemens Place • Cuidando do seu estilo com atitude.
                            </p>
                        </div>
                    ";
        $mail->AltBody = "
                        Esqueceu sua senha?
                        Fica tranquilo(a), isso acontece!
                        Recebemos uma solicitação para redefinir a senha da sua conta na The Glantemens Place.

                        Clique no link abaixo para criar uma nova senha:
                        http://localhost/barber-shop/index.php?token=$TOKEN

                        Se você não solicitou isso, é só ignorar este e-mail. 😉

                        The Glantemens Place • Cuidando do seu estilo com atitude.
                    "; // Versão sem HTML

        $mail->send();
        echo 'E-mail enviado com sucesso!';
    } catch (Exception $e) {
        echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
    }
}

function alterarSenha($idUser, $newPass) {

    global $pdo;

    try {

        $sql = "UPDATE usuarios SET SENHA = :newPass WHERE ID_USUARIO = :idUser";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam("newPass", $newPass);
        $stmt->bindParam("idUser", $idUser);
        $res = $stmt->execute();

    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }

    
}

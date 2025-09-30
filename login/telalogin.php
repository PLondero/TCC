<?php
session_start();

include('../php/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = htmlspecialchars(trim($_POST["email"]));
    $senha = $_POST["senha"];
    $sql_check = "SELECT id_usuario, senha, nome_usuario, email_usuario FROM usuarios WHERE email_usuario = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result = $stmt_check->get_result();
    if ($result->num_rows == 0){
        $erro = "email não existe";
    } else {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row ["senha"])){
            $_SESSION['id_usuario'] = $row["id_usuario"];
            $_SESSION['nome_usuario'] = $row["nome_usuario"];
            $_SESSION['email'] = $row["email"];

            header("location: ../hub/dashboard/dashboard.php");
            exit;
        } else {
            $erro = "Senha Incorreta";
        }
        $stmt_check->close();
    }
    





}




?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Educação Financeira</title>
        <link rel="stylesheet" href="login.css">



        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        
    </head>
    <body>
        <div class="container">
                <div class="img"></div>
                <div class="login" id="sour-gummy">
                    <div class="conteudo">
                        <h1>Login</h1>
                        <form method="post" action="telalogin.php">
                            <label> <input type="email" placeholder="Digite seu email" name="email"></label>
                            <label> <input type="password" placeholder="Digite sua senha" name="senha"> </label>
                            <button type="submit" class="entrar"> Entrar </button> 
                        </form>
                    </div>
                </div>
        </div>
    </html>
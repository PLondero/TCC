<?php
session_start();

include('../php/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = htmlspecialchars(trim($_POST["nome"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $senha = $_POST["senha"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erro = "Email invalido!";
    } else {

    $sql_check = "SELECT id_usuario FROM usuarios WHERE email_usuario = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0){
        $erro = "Email já cadastrado!";
    } else {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome_usuario, email_usuario, senha) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senha_hash);

        if ($stmt->execute()) {
            $_SESSION['id_usuario'] = $stmt->insert_id;
            $_SESSION['nome_usuario'] = $nome;
            $_SESSION['email'] = $email;

            header("location: ../hub/dashboard/dashboard.php");
            exit;
        } else {
            $erro = "Erro ao cadastrar" . $stmt->error;
        }

        $stmt->close();
        }
        $stmt_check->close();
    }
    $conn->close();
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
                <div class="img" id="dois"></div>
                <div class="login" id="sour-gummy">
                    <div class="conteudo">
                        <h1>Cadastro</h1>
                        <form method="post" action="cadastrar.php">
                            <label> <input type="text" placeholder="Digite seu usuário" name="nome"></label>
                            <label> <input type="email" placeholder="Digite seu e-mail" name="email"></label>
                            <label> <input type="password" placeholder="Digite sua senha" name="senha"> </label>
                            <button type="submit" class="entrar"> Cadastrar </button> 
                        </form>
                    </div>
                </div>  
        </div>
    </html>
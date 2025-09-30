<?php 
    session_start();
    include('../../php/conexao.php');    
    

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $razao = htmlspecialchars(trim($_POST["razao"]));
        $valor = htmlspecialchars(trim($_POST["valor"]));
        if ($_POST["tipo"] < 0){
            $valor = $valor * -1;
        }

        $conn->autocommit(false);
        if ($_POST["dia"] != null){
            $dia = htmlspecialchars(trim($_POST["dia"]));
            $stmt = $conn->prepare("INSERT INTO valores_fixos (razao, valor, dia, id_usuario) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sdii", $razao, $valor, $dia, $_SESSION["id_usuario"]);
            $stmt->execute();
        } else if ($_POST["data_entrada"] != null){
            $data_entrada = htmlspecialchars(trim($_POST["data_entrada"]));
            $stmt = $conn->prepare("INSERT INTO transacao (razao, valor, data_entrada, id_usuario) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sdsi", $razao, $valor, $data_entrada, $_SESSION["id_usuario"]);
            $stmt->execute();
            $stmt=$conn->prepare("UPDATE usuarios SET saldo = saldo + ? WHERE id_usuario = ?");
            $stmt->bind_param("di", $valor, $_SESSION["id_usuario"]);
            $stmt->execute();
        }
        $conn->commit();
        $stmt->close();
        header("location: financeiro.php");
    }




?>

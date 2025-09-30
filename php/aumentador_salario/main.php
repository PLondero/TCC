<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $servname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "educamoney";

    $conn = new mysqli($servname, $username, $password, $dbname );

    if ($conn -> connect_error){
        die("Falha na conexão". $conn-> connect_error);
    }

    $conn -> set_charset("utf8");

    $hoje = date("d");
    
    $result = $conn->query("SELECT valores_fixos.id_usuario, valores_fixos.razao, valores_fixos.valor, valores_fixos.dia FROM valores_fixos ORDER BY id_usuario");

    $conn->autocommit(false);
    while ($row = $result->fetch_assoc()){
        if ($row["dia"] == $hoje){
            $stmt=$conn->prepare("UPDATE usuarios SET saldo = saldo + ? WHERE id_usuario = ?");
            $stmt->bind_param("di", $row["valor"], $row["id_usuario"]);
            $stmt->execute();
            $stmt=$conn->prepare("INSERT INTO transacao (razao, valor, id_usuario) VALUES (?, ?, ?)");
            $stmt->bind_param("sdi", $row["razao"], $row["valor"], $row["id_usuario"]);
            $stmt->execute();
        }
    }
    $conn->commit();
    $conn->close();
    
    





















?>
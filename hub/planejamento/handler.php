<?php 
session_start();
include('../../php/conexao.php');    

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $meta = trim($_POST["meta"]);
    if (isset($_POST["name"]) && $_POST["name"] == "addMeta") { // <- checa se é a operação 
        $valor_adicional = $_POST["additional"];
        $id_usuario = (int) $_SESSION["id_usuario"];
        $conn->autocommit(false);
        $stmt = $conn->prepare(
            "UPDATE planejamento 
            SET valor_atual = valor_atual + ?
            WHERE id = ? AND id_usuario = ?"
        );
        $stmt->bind_param("dsi", $valor_adicional, $meta, $id_usuario);
        $stmt->execute();
        $stmt = $conn->prepare(
            "UPDATE usuarios
            set saldo = saldo - ?
            WHERE id_usuario = ?"
        );
        $stmt->bind_param("di", $valor_adicional, $id_usuario);
        $stmt->execute();
        $conn->commit();
        header("Location: planejamento.php");
        return;
        }

    if (isset($_POST["name"]) && $_POST["name"] == "deleteMeta") {
        $id_usuario = (int) $_SESSION["id_usuario"];
        $stmt = $conn->prepare(
            "DELETE FROM planejamento 
            WHERE id = ? AND id_usuario = ?"
        );
        $stmt->bind_param("si",  $meta, $id_usuario);
        $stmt->execute();
        header("Location: planejamento.php");
        return;
    }
    $valor_total = (float) $_POST["valor_total"];
    $valor_atual = (float) $_POST["valor_atual"];
    $id_usuario = (int) $_SESSION["id_usuario"];

    $conn->autocommit(false);
        
    $stmt = $conn->prepare("INSERT INTO planejamento (meta, valor_total, valor_atual, id_usuario) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sddi", $meta, $valor_total, $valor_atual, $id_usuario);
    $stmt->execute();
    if ($stmt->affected_rows === 0) {
        echo "Erro ao inserir: " . $stmt->error;
        exit;
    } else {
        echo "Meta adicionada com sucesso!";
        $conn->commit();
        $stmt->close();
        header("Location: planejamento.php");
    }
        
}
?>


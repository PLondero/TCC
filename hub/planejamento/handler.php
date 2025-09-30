<?php 
session_start();
include('../../php/conexao.php');    

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $meta = trim($_POST["meta"]);
    $valor_total = (float) $_POST["valor_total"];
    $valor_atual = (float) $_POST["valor_atual"];
    $id_usuario = (int) $_SESSION["id_usuario"];

    $conn->autocommit(false);

    $stmt = $conn->prepare("INSERT INTO planejamento (meta, valor_total, valor_atual, id_usuario) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sddi", $meta, $valor_total, $valor_atual, $id_usuario);

    if ($stmt->execute()) {
        $conn->commit();
        $stmt->close();
        header("Location: planejamento.php");
        exit;
    } else {
        echo "Erro ao inserir: " . $stmt->error;
    }
}
?>


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

?>
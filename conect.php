<?php
$localhost = "localhost";
$user = "root";
$pass = "";
$database = "cadastro";

$conn = new mysqli($localhost, $user, $pass, $database);

if($conn->connect_error){
    echo "Falha na conexão" . $conn->connect_error;
}
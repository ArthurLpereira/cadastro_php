<?php
// Inclua a conexão com o banco de dados
include 'conect.php';

// Verifica se o ID foi passado na URL
if (isset($_GET['id_usuario'])) {

    $id = $_GET['id_usuario'];

    // Verifica se o ID é numérico para evitar SQL Injection
    if (is_numeric($id)) {
        // Consulta SQL para deletar o registro
        $sql = "DELETE FROM usuarios WHERE id_usuario = $id";

        // Depuração: verifique a consulta SQL
        var_dump($sql);

        // Executa a consulta e verifica se foi bem-sucedida
        if (mysqli_query($conn, $sql)) {
            echo "
                <script>
                    alert('Usuário deletado com sucesso!'); 
                    window.location.href='index.php';
                </script>";
        } 
        else {
            // Exibe o erro da consulta SQL
            var_dump(mysqli_error($conn));
            echo "<script>alert('Erro ao deletar usuário: " . mysqli_error($conn) . "');</script>";
        }
    } 
    
    
    else {
        echo "
            <script>
                alert('ID inválido!'); 
                window.location.href='index.php';
            </script>";
    }
}

else {
    echo "
        <script>
            alert('ID de usuário não fornecido!'); 
            window.location.href='index.php';
        </script>";
}

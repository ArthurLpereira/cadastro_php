<?php
include 'conect.php';

if (isset($_GET['id_usuario'])){

    $id = $_GET['id_usuario'];

    if (is_numeric($id)){

        $sql = "DELETE FROM usuarios WHERE id_usuario = $id";

        var_dump($sql);

        if (mysqli_query($conn,$sql)){
            echo "
            <script>
                alert('Usuário deletado com sucesso!');
                window.location.href='index.php';
            </script>";
        }
        else{
            var_dump(mysqli_error($conn));
            echo "<script>
                alert('Erro ao deletar usuário: ". mysqli_error($conn) ."')
            </script>";
        }
    }

    else{
        echo "
        <script> 
            alert('ID inválido!');
            window.location.href='index.php';
        </script>";
    }
}

else {
    echo "<script>
        alert('ID de usuário não fornecido!');
        window.location.href='index.php';
    </script>";
}
?>
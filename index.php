<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de cadastro</title>
</head>
<body>
    <h1>Lista de usuarios</h1>

    <a href="cadastro.php"><button>Cadastrar</button></a>
    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>

        <?php
            include 'conect.php';

            $sql = "SELECT * FROM usuarios";
            $result = mysqli_query($conn, $sql);

            if($result){
                // se der bom na consulta
                if(mysqli_num_rows($result)>0){
                    // Se tiver registros
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>" . $row['id_usuario'] . "</td>";
                        echo "<td>" . $row['nome_usuario']  . "</td>";
                        echo "<td>" . $row['email_usuario'] . "</td>";
                        echo "<td>";
                        echo "<a href='editar.php?id_usuario=" . $row['id_usuario'] ."'>Editar<a/> |";
                        echo "<a href='deletar.php'?id_usuario=" . $row['id_usuario'] . "'onclick =\"return confirm('tem certeza que deseja deletar esse usuario?');\">Deletar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }}else{
                        // nao tiver registro
                        echo "<tr><td colspan='4'>Nenhum registro encontrado</td></tr>";
                    }
                }else{
                    // se der ruim na consulta
                    echo "Erro na consulta SQL:" . mysqli_error($conn);
                }
        ?>
    </table>
</body>
</html>
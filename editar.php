<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conect.php';

// Verifica se o ID do usuário foi passado via GET
if (isset($_GET['id_usuario'])) {
    $id = intval($_GET['id_usuario']); // Sanitiza o ID

    // Consulta SQL para buscar o registro com o ID fornecido
    $sql = "SELECT * FROM usuarios WHERE id_usuario = $id";
    $result = mysqli_query($conn, $sql);

    // Verifica se a consulta foi bem-sucedida
    if (!$result) {
        die("Erro na consulta SQL: " . mysqli_error($conn));
    }

    // Verifica se o usuário foi encontrado
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        die("Usuário não encontrado.");
    }
} else {
    die("ID não especificado.");
}

// Processa o formulário de edição quando enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = mysqli_real_escape_string($conn, $_POST['nome_usuario']);
    $email = mysqli_real_escape_string($conn, $_POST['email_usuario']);

    // Atualiza o registro no banco de dados
    $update_sql = "UPDATE usuarios SET nome_usuario = '$nome', email_usuario = '$email' WHERE id_usuario = $id";
    $update_result = mysqli_query($conn, $update_sql);

    // Verifica se a atualização foi bem-sucedida
    if ($update_result) {
        echo "Usuário atualizado com sucesso.";
        echo "<br><a href='index.php'>Voltar para a lista</a>";
    } else {
        die("Erro ao atualizar o usuário: " . mysqli_error($conn));
    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h2>Editar Usuário</h2>
    <form action="edit.php?id=<?php echo htmlspecialchars($user['id_usuario']); ?>" method="post">
        <label for="nome_usuario">Nome:</label>
        <input type="text" id="nome_usuario" name="nome_usuario" value="<?php echo htmlspecialchars($user['nome_usuario']); ?>" required>
        <br><br>
        <label for="email_usuario">Email:</label>
        <input type="email" id="email_usuario" name="email_usuario" value="<?php echo htmlspecialchars($user['email_usuario']); ?>" required>
        <br><br>
        <input type="submit" value="Atualizar">
    </form>
    <br>
    <a href="index.php">Voltar para a lista</a>
</body>
</html>

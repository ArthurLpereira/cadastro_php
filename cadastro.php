<?php
    include "conect.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user =$_POST['nome'];
        $email =$_POST['email'];
        $senha = md5($_POST['senha']);

        $sql = "INSERT INTO usuarios (nome_usuario,email_usuario,senha_usuario) VALUES ('$user','$email','$senha')";

        if(mysqli_query($conn,$sql)){
            echo "<script>alert('Registrado com sucesso')</script>";
        }else{
            echo "Algo deu errado no registro" . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <header>
        <h1>Faça o seu cadastro</h1>
    </header>

    <main>
        <form action="" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email">

            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha">

            <button type="submit">Cadastrar</button>
        </form>

        <a href="index.php">Ver a lista de usuarios</a>
    </main>
</body>
</html>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
    <title>Cadastro</title>
</head>
<body>
        
    <main>
        <div id="h1">
            <p>faça cadastro</p>
        </div>
        <div id="formulario">
            <form action="" method="POST">
                <div>
                    <label for="nome"><i class="fa-solid fa-user"></i></i></label>
                    <input type="text" name="nome" id="nome" placeholder="Nome">
                </div>
                
                <div>
                    <label for="email"><i class="fa-solid fa-envelope"></i></label>
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>
                
                <div>
                    <label for="senha"><i class="fa-solid fa-lock"></i></label>
                    <input type="password" name="senha" id="senha" placeholder="Senha">
                </div>
                
            
                <button type="submit">Cadastrar</button>
            </form>
        </div>
        <a href="index.php">Ver a lista de usuarios</a>
    </main>
</body>
</html>
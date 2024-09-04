
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM startups WHERE emailStartup = '$email'";
            $result = mysqli_query($conn, $sql);
            $startup_user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($startup_user) {
                if (password_verify($password, $startup_user["password"])) {
                    session_start();
                    $_SESSION['id'] = $startup_user['id']; // Armazena o ID do usuário na sessão
                    $_SESSION['nomeStartup'] = $startup_user['nomeStartup']; 
                    $_SESSION['descricao'] = $startup_user['descricao'];
                    $_SESSION['fundador'] = $startup_user['fundador'];
                    $_SESSION['setor'] = $startup_user['setor'];
                    $_SESSION['endereco'] = $startup_user['endereco'];
                    $_SESSION['contato'] = $startup_user['contato'];
                    $_SESSION['website'] = $startup_user['website'];
                    $_SESSION['emailStartup'] = $startup_user['emailStartup'];
                    header("Location: indexStartup.php");
                    die();
                } else {
                    echo "<div class='alert alert-danger'> Senha incorreta </div>";
                }
            } else {
                echo "<div class='alert alert-danger'> Email incorreto ou inválido </div>";
            }
            
        }
        ?>

        <h1 class="form-group"> Login Startup </h1>
        <form action="loginStartup.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Senha " name="password" class="form-control">
            </div>
            <div class="form-btn form-group">
                <input type="submit" value="Logar" name="login" class="btn btn-primary">
            </div>
        </form>
        <div>
            <p> Não possui conta? <a href="signup-startup.php"> Criar conta </a></p>
        </div>
        <div>
            <p> É um INVESTIDOR já cadastrado? <a href="login.php"> Logar </a></p>
        </div>
        <div>
        <?php

            if (isset($_GET["newpwd"])) {
                if($_GET["newpwd"] == "passwordupdated") {
                    echo "<div class='alert alert-success'> Sua senha foi redefinida com sucesso!</div>";
                }
            }

            if (isset($_GET["delete"])) {
                if($_GET["delete"] == "deletado") {
                    echo "<div class='alert alert-success'> Conta deletada com sucesso, faça login em outra conta ou crie uma nova! </div>";
                }
            }

            if (isset($_GET["email"])) {
                if($_GET["email"] == "emailenviado") {
                    echo "<div class='alert alert-success'> Email de contato enviado </div>";
                }
            }
        ?>
            <p> <a href="reset-password.php"> Esqueceu a senha? </a> </p>
        </div>
    </div>
</body>
</html>
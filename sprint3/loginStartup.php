
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
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = $user["email"];
                    $_SESSION["full_name"] = $user["full_name"];
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'> Senha incorreta </div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email incorreto ou inválido </div>";
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
                <input type="submit" value="Logar" name="loginStartup" class="btn btn-primary">
            </div>
        </form>
        <div>
            <p> Não possui conta? <a href="registration.php"> Criar conta </a></p>
        </div>
        <div>
            <p> Deseja redefinir sua senha? <a href="password.php"> Redefinir senha </a></p>
        </div>
        <div>
        <?php

            if (isset($_GET["newpwd"])) {
                if($_GET["newpwd"] == "passwordupdated") {
                    echo "<div class='alert alert-success'> Sua senha foi redefinida com sucesso!</div>";
                }
            }
        ?>
            <p> <a href="reset-password.php"> Esqueceu a senha? </a> </p>
        </div>
    </div>
</body>
</html>
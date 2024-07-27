
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TESTE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {

            $email = $_POST["email"];
            $oldPassword = $_POST["old_password"];
            $newPassword = $_POST["new_password"];
            $repeatPassword = $_POST["repeat_password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if ($user) {

                if (!password_verify($oldPassword, $user["password"])) {
                    echo "<div class='alert alert-danger'> Senha anterior incorreta </div>";
                } else if (password_verify($newPassword, $user["password"])) {
                    echo "<div class='alert alert-danger'> Nova senha não pode ser igual a antiga </div>";
                } else if (strlen($newPassword) < 8 || strlen($repeatPassword) < 8) {
                    echo "<div class='alert alert-danger'> Nova senha deve possuir 8 ou mais caracteres </div>";
                } else if ($newPassword!==$repeatPassword) {
                    echo "<div class='alert alert-danger'> Senhas não conferem </div>";
                } else {
            
                    $sql = "UPDATE users SET password = ? WHERE email = ?";
                    $stmt = mysqli_stmt_init($conn);
                    
                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $email);
                        $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
                        
                        if (mysqli_stmt_execute($stmt)) {
                            echo "<div class='alert alert-success'>A senha foi atualizada</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Erro ao atualizar a senha</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Erro na preparação da consulta</div>";
                    }
                }   
            
            } else {
                echo "<div class='alert alert-danger'>Email incorreto ou inválido </div>";
            }
        }
        
        ?>

        <h1 class="form-group"> Redefinir Senha </h1>

        <form action="password.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Senha antiga" name="old_password" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Nova senha" name="new_password" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repetir nova senha:">
            </div>
            <div class="form-btn form-group">
                <input type="submit" value="Redefinir" name="login" class="btn btn-primary">
            </div>
        </form>
        
        <div>
            <p> Não possui conta? <a href="registration.php"> Criar conta </a></p>
        </div>
        <div>
            <p> Já possui conta? <a href="login.php">Login</a></p>
        </div>

    </div>
</body>
</html>
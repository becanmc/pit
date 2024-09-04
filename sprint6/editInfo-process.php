<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <?php
        require_once "database.php";
        session_start();

        if (!isset($_SESSION["user"])) {
            header("Location: login.php");
            exit();
        }

        if (isset($_POST["submitEditInfo"])) {
            $full_name = mysqli_real_escape_string($conn, $_POST["Name"]);
            $email = mysqli_real_escape_string($conn, $_SESSION["user"]); // Alteração aqui

            if (empty($full_name)) {
                echo "<div class='alert alert-danger'>Todos os campos devem ser preenchidos</div>";
            } else {
                $sql = "UPDATE users SET full_name = ? WHERE email = ?";
                $stmt = mysqli_stmt_init($conn);
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "ss", $full_name, $email);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>Informações atualizadas com sucesso.</div>";
                    echo "<div> Para sua segurança, refaça o login. <a href='logout.php'>Clique aqui</a></div>";
                } else {
                    echo "<div class='alert alert-danger'>Erro ao atualizar informações.</div>";
                }
            }
        } else {
            header("Location: editInfo.php");
            exit();
        }
        ?>

</body>
</html>

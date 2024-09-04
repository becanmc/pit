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

        if (isset($_SESSION["user"])) {
            header("Location: loginStartup.php");
            exit();
        }

        if (isset($_POST["submitEditStartup"])) {
            $nomeStartup = mysqli_real_escape_string($conn, $_POST["startupName"]);
            $descricao = mysqli_real_escape_string($conn, $_POST["descricao"]);
            $criador = mysqli_real_escape_string($conn, $_POST["criador"]);
            $areaAtuacao = mysqli_real_escape_string($conn, $_POST["area"]);
            $endereco = mysqli_real_escape_string($conn, $_POST["endereco"]);
            $contato = mysqli_real_escape_string($conn, $_POST["contato"]);
            $link = mysqli_real_escape_string($conn, $_POST["link"]);
            $emailStartup = mysqli_real_escape_string($conn, $_SESSION["emailStartup"]);

            if (empty($nomeStartup) || empty($descricao) || empty($criador) || empty($areaAtuacao) || empty($endereco) || empty($contato) || empty($link)) {
                echo "<div class='alert alert-danger'>Todos os campos devem ser preenchidos</div>";
            } else {
                $sql = "UPDATE startups SET nomeStartup = ?, descricao = ?, fundador = ?, setor = ?, endereco = ?, contato = ?, website = ? WHERE emailStartup = ?";
                $stmt = mysqli_stmt_init($conn);
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "ssssssss", $nomeStartup, $descricao, $criador, $areaAtuacao, $endereco, $contato, $link, $emailStartup);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>Informações atualizadas com sucesso.</div>";
                    echo "<div> Para sua segurança, refaça o login.<a href='logoutStartup.php'>Clique aqui</a> </div>";
                } else {
                    echo "<div class='alert alert-danger'>Erro ao atualizar informações.</div>";
                }
            }
        } else {
            header("Location: editStartup.php");
            exit();
        }
        ?>

</body>
</html>


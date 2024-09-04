<?php

require_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if (isset($_POST["submitStartup"])) {

            $nomeStartup = $_POST["startupName"];
            $descricao = $_POST["descricao"];
            $criador = $_POST["criador"];
            $areaAtuacao = $_POST["area"];
            $endereco = $_POST["endereco"];
            $contato = $_POST["contato"];
            $link = $_POST["link"];
            $emailStartup = $_POST["emailStartup"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];
            
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            

            if (empty($nomeStartup) OR empty($descricao) OR empty($criador) OR empty($areaAtuacao) OR empty($endereco) OR empty($contato) OR empty($link) OR empty($emailStartup) OR empty($password) OR empty($passwordRepeat)) {
                echo "<div class='alert alert-danger'> Todos os campos devem ser preenchidos </div>";
            } else if (!filter_var($emailStartup, FILTER_VALIDATE_EMAIL)) {
                echo "<div class='alert alert-danger'> Email inválido </div>";

            } else if(strlen($password)<8) {
                echo "<div class='alert alert-danger'> Senha deve ter no mínimo 8 caracteres</div>";
            } else if ($password!==$passwordRepeat) {
                echo "<div class='alert alert-danger'> Senha incorreta</div>";
            } else {

                $sql = "SELECT * FROM startups WHERE emailStartup = '$emailStartup'";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if ($rowCount>0) {
                    echo "<div class='alert alert-danger'> Email já registrado! </div>";
                } else {
                    $sql = "INSERT INTO startups (nomeStartup, descricao, fundador, setor, endereco, contato, website, emailStartup, password) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ? )";
                    $stmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                    if ($prepareStmt) {
                        mysqli_stmt_bind_param($stmt,"sssssssss",$nomeStartup, $descricao, $criador, $areaAtuacao, $endereco, $contato, $link, $emailStartup, $passwordHash);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='alert alert-success'> Registro feito com sucesso.</div>";
                        echo "<p> <a href='loginStartup.php'>Login</a></p>";
                    }else{
                        die("<div class='alert alert-success'> Registro feito com sucesso.</div>");
                        header("Location: loginStartup.php");
                    }
                }
                    
            }
            
            

        } else {
            header("Location: login.php");
            exit();
        }

    ?>
    
</body>
</html>
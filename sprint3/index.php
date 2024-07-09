
<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit(); // Encerrar a execução para garantir que o código abaixo não seja executado
}

// Exibir o nome e o email do usuário
$full_name = $_SESSION["full_name"];
$email = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title> Usuário</title>
</head>
<body>
    <div class="container">
        <h1> Bem-vindo, <?php echo $full_name; ?> </h1>
        <p> Seu email: <?php echo $email; ?> </p>
        <a href="logout.php" class="btn btn-warning"> Deslogar </a>
    </div>
</body>
</html>



<?php
session_start();

if (!isset($_SESSION["id"], $_SESSION["user"], $_SESSION["full_name"])) {
    header("Location: login.php");
    exit(); // Encerrar a execução para garantir que o código abaixo não seja executado
}

// Agora $_SESSION['id'], $_SESSION['user'] e $_SESSION['full_name'] contêm as informações do usuário
$user_id = $_SESSION["id"];
$email = $_SESSION["user"];
$full_name = $_SESSION["full_name"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Usuário</title>
</head>
<body>


    <div class="container">
        <h1>Bem-vindo, <?php echo $full_name; ?></h1>
        <p>Seu email: <?php echo $email; ?></p>
        <p> Deseja redefinir sua senha? <a href="password.php"> Redefinir senha </a></p>
        <a href="logout.php" class="btn btn-warning">Deslogar</a>
        <a href="editInfo.php" class="btn btn-warning">Editar Informações</a>
        <form action="delete-account.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
            <button type="submit" name="delete-button" class="btn btn-danger">Excluir conta</button>
        </form>
    </div>
</body>
</html>

<?php
session_start();

if (!isset($_SESSION["id"], $_SESSION["user"], $_SESSION["full_name"])) {
    header("Location: login.php");
    exit();
}

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
    <title>Deletar Conta</title>
</head>
<body>
    <div class="container">
        <h1>Deletar conta</h1>
        <p>Ao clicar no botão abaixo, você entende que sua conta, junto com os seus dados serão deletados!</p>
        
        <!-- Formulário para enviar o id para a página de confirmação de exclusão -->
        <form action="delete-account-request.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
            <button type="submit" name="delete-button" class="btn btn-danger">Excluir conta</button>
        </form>
        
        <a href="index.php" class="btn btn-secondary mt-3">Cancelar</a>
    </div>
</body>
</html>

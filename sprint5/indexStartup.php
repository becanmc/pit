<?php
session_start();

if (!isset($_SESSION["id"], $_SESSION["nomeStartup"], $_SESSION["descricao"], $_SESSION["fundador"], $_SESSION["setor"], $_SESSION["endereco"], $_SESSION["contato"], $_SESSION["website"], $_SESSION["emailStartup"])) {
    header("Location: loginStartup.php");
    exit(); // Encerrar a execução para garantir que o código abaixo não seja executado
}

// Agora $_SESSION['id'], $_SESSION['user'] e $_SESSION['full_name'] contêm as informações do usuário
$user_id = $_SESSION["id"];
$nome_startup = $_SESSION["nomeStartup"];
$desc_startup = $_SESSION["descricao"];
$fund_startup = $_SESSION["fundador"];
$setor_startup = $_SESSION["setor"];
$end_startup = $_SESSION["endereco"];
$contato_startup = $_SESSION["contato"];
$site_startup = $_SESSION["website"];
$email_startup = $_SESSION["emailStartup"];

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
        <h1>Bem-vindo</h1>
        <h2>Informações da Stratup:</h2>
        <p>Nome: <?php echo $nome_startup; ?></p>
        <p>Descrição: <?php echo $desc_startup; ?></p>
        <p>Fundador(es): <?php echo $fund_startup; ?></p>
        <p>Setor: <?php echo $setor_startup; ?></p>
        <p>Endereço: <?php echo $end_startup; ?></p>
        <p>Contato: <?php echo $contato_startup; ?></p>
        <p>Website: <?php echo $site_startup; ?></p>
        <p>Email: <?php echo $email_startup; ?></p>
        <div><a href="logoutStartup.php" class="btn btn-warning">Deslogar</a></div>
        <div><a href="editStartup.php" class="btn btn-warning">Editar Info</a></div>
        <form action="delete-account-startup.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
            <button type="submit" name="delete-button" class="btn btn-danger">Excluir conta</button>
        </form>
    </div>
</body>
</html>

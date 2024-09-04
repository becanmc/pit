<?php
session_start();
require_once "database.php";

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION["user"];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        echo "<div class='alert alert-danger'>Usuário não encontrado.</div>";
        exit();
    }
}
?>
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
    <div class="container">
        <h1 class="form-group">Editar Investidor</h1>
        <form action="editInfo-process.php" method="post" enctype="multipart/form-data">
            <label>Edite as informações da sua Conta</label>
            <div class="form-group">
                <input type="text" class="form-control" name="Name" placeholder="Nome" value="<?php echo htmlspecialchars($user['full_name']); ?>">
            </div>
            <div class="form-btn form-group">
                <input type="submit" class="btn btn-primary" value="Atualizar" name="submitEditInfo">
            </div>
            <p> Deseja redefinir sua senha? <a href="password.php"> Redefinir senha </a></p>
        </form>
    </div>
</body>
</html>

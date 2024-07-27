<?php
session_start();
require_once "database.php";

if (isset($_SESSION["user"])) {
    header("Location: loginStartup.php");
    exit();
}

$emailStartup = $_SESSION["emailStartup"];
$sql = "SELECT * FROM startups WHERE emailStartup = ?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_bind_param($stmt, "s", $emailStartup);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $startup = mysqli_fetch_assoc($result);
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
        <h1 class="form-group">Editar Startup</h1>
        <form action="editStartup-process.php" method="post" enctype="multipart/form-data">
            <label>Edite as informações da sua Startup</label>
            <div class="form-group">
                <input type="text" class="form-control" name="startupName" placeholder="Nome" value="<?php echo htmlspecialchars($startup['nomeStartup']); ?>">
            </div>
            <div class="form-btn form-group">
                <textarea name="descricao" class="form-control" placeholder="Use este campo para fazer uma descrição de sua Startup!"><?php echo htmlspecialchars($startup['descricao']); ?></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="criador" placeholder="Criador/es da Startup" value="<?php echo htmlspecialchars($startup['fundador']); ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="area" placeholder="Área de atuação" value="<?php echo htmlspecialchars($startup['setor']); ?>">
            </div>
            <div class="form-group">
                <textarea name="endereco" class="form-control" placeholder="Endereço onde sua startup está situada"><?php echo htmlspecialchars($startup['endereco']); ?></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="contato" placeholder="Número de contato" value="<?php echo htmlspecialchars($startup['contato']); ?>">
            </div>
            <div class="form-group">
                <input type="url" class="form-control" name="link" placeholder="Link do seu website ou portfólio" value="<?php echo htmlspecialchars($startup['website']); ?>">
            </div>
            <div class="form-group">
                <input type="file" class="form-control" name="imagem" placeholder="Logo da sua Startup">
            </div>
            <div class="form-btn form-group">
                <input type="submit" class="btn btn-primary" value="Atualizar" name="submitEditStartup">
            </div>
            <p> Deseja redefinir sua senha? <a href="password.php"> Redefinir senha </a></p>
        </form>
    </div>
</body>
</html>

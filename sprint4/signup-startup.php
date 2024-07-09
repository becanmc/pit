<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
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
    <div class="container">
        <h1 class="form-group"> Cadastrar Startup </h1>
        <form action="signupStartup-process.php" method="post" enctype="multipart/form-data">
            <label> Primeiramente, insira as informações técnicas de sua startup </label>
            <div class="form-group">
                <input type="text" class="form-control" name="startupName" placeholder="Nome">
            </div>
            <div class="form-btn form-group">
                <textarea name="descricao" class="form-control" placeholder="Use este campo para fazer uma descrição de sua Startup!"></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="criador" placeholder="Criador/es da Startup">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="area" placeholder="Area de atuação">
            </div>
            <div class="form-group">
                <textarea name="endereco" class="form-control" placeholder="Endereço onde sua startup esta situada"></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="contato" placeholder="Numero de contato">
            </div>
            <div class="form-group">
                <input type="url" class="form-control" name="link" placeholder="Link do seu website ou portfolio">
            </div>
            <div class="form-group">
                <input type="file" class="form-control" name="imagem" placeholder="Logo da sua Startup">
            </div>
            <label> Agora, digite as credenciais para cadastrarmos sua Startup! </label>
            <div class="form-group">
                <input type="email" class="form-control" name="emailStartup" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Senha">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repetir senha">
            </div>
            <div class="form-btn form-group">
                <input type="submit" class="btn btn-primary" value="Register" name="submitStartup">
            </div>
        </form>
        <div>
        <div>
            <p> Já possui conta? <a href="login.php">Login</a></p>
        </div>
      </div>

      
    </div>
</body>
</html>
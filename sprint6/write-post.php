<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: loginStartup.php");
    exit();
}

$user_id = $_SESSION["id"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Escrever um post</title>
</head>
<body>
    <div class="container">
        <h1> Escrever um post </h1>
        <p> Aqui você pode escrever uma atualização sobre um projeto recentemente desenvolvido, publicar alguma pesquisa e etc. Ao finalizar, o que você escrever será adicionado a área de publicações na sua página para outras pessoas poderem vizualizar!</p>
        
        <!-- Formulário para enviar o id para a página de confirmação de exclusão -->
        <form action="write-post-request.php" method="post">
            <div>
                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="post-title" placeholder="Título">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="post-category" placeholder="Categoria">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="post-author" placeholder="Autor">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="post-description" placeholder="Uma breve descrição do seu post"placeholder="Uma breve descrição do seu post" id=""></textarea>
                
            </div>
            <div class="form-group">
                <textarea class="form-control" name="post-body" placeholder="Corpo do seu post" id=""></textarea>
            </div>
            <div class="form-group form-btn">
                <button type="submit" name="submit-post" class="btn btn-primary"> Enviar Post </button>
            </div> 
        </form>

        <div class="form-group form-btn">
            <a href="indexStartup.php" class="btn btn-secondary mt-3"> Voltar para perfil</a>
        </div>
        
        
    </div>
</body>
</html>

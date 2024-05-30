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
            <title> Redefinir senha </title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <div class="container">
                <?php
                    $selector = $_GET["selector"];
                    $validator = $_GET["validator"];

                    if (empty($selector) || empty($validator)) {
                        echo "<div class='alert alert-danger'> Não foi possível validar sua solicitação </div>";
                    } else {
                        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                            ?>

                                <h1 class="form-group"> Definir nova senha </h1>

                                <form action="reset-password.inc.php" method="post">

                                    <input type="hidden" name="selector" value="<?php echo $selector ?>;">
                                    <input type="hidden" name="validator" value="<?php echo $validator ?>;">

                                    <div class="form-group">
                                        <input class="form-control" type="password" name="pwd" placeholder="Insira sua nova senha">
                                    </div>
                                    
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="pwd-repeat" placeholder="Insira a senha novamente">
                                    </div>
                                    
                                    <div class="form-btn form-group">
                                        <button class="btn btn-primary" type="submit" name="reset-password-submit"> Redefinir senha </button>
                                    </div>
                                   
                                </form>

                            <?php
                        }
                    }
                ?>               

            </div>
        </body>
    </html>
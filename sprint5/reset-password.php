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
            <title> Recefinir senha </title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <div class="container">
                <h1 class="form-group"> Redefinir senha </h1>
                <p> Um email vai ser enviado para você com as instruições de como redefinir sua senha </p>
                <form action="reset-request.php" method="post">

                    <div class="form-group">
                        <input type="email" name="email" placeholder="Insira seu endereço de email" class="form-control">
                        
                    </div>

                    <div class="form-btn form-group">
                        <button type="submit" name="reset-request-submit" class="btn btn-primary"> Receber nova senha por email </button>
                    </div>
                    
                </form>

                <?php
                    if (isset($_GET["reset"])) {
                        if($_GET["reset"] == "success") {
                            echo "<div class='alert alert-success'> Confira seu email.</div>";
                        }
                    }
                ?>

            </div>
        </body>
    </html>
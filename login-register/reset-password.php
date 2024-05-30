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
            <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>

    .dark-mode
    {
        --bg-color: rgb(30, 30, 30);
        --bg-container-color: rgb(46, 46, 46);
        --bg-text-color: white;
    }

    body {
        padding: 50px;
        background-color: var(--bg-color);
        color: var(--bg-text-color);
        font-family: "Poppins", sans-serif;
    }


    .container {
        background-color: var(--bg-container-color);
        box-shadow: rgba(0, 0, 0, 0.2) 0px 7px 29px 0px;
        max-width: 600px;
        margin: 0 auto;
        padding: 50px;
        border-radius: 15px
    } 

    .form-group {
        margin-bottom: 30px;
        text-align: center;
    }

    .btn-dark-mode
    {
        height: 4vh;
        border-radius: 10px;
        border: 1px solid black;
        background-color: white;
        cursor: pointer; 
        font-family: "Poppins", sans-serif;
    }

    .dark-mode .btn-dark-mode
    {
        height: 4vh;
        border-radius: 10px;
        border: 1px solid white;
        color:white;
        background-color: var(--bg-color);
        cursor: pointer; 
    }

    .btn
    {
        font-family: "Poppins", sans-serif;
    }

    .dark-mode a {
        color: rgb(63, 63, 255)
    }    

    </style>

    <script>
    var mode = 1;
    function darkMode(){

        document.body.classList.toggle("dark-mode");

        if (mode==1){
            document.querySelector(".btn-dark-mode").innerHTML = "Light Mode";
            mode = 0;
        } else
        {
            document.querySelector(".btn-dark-mode").innerHTML = "Dark Mode";
            mode = 1;
        } 
    }
    </script>

        <button class="btn-dark-mode" onclick="darkMode()">Dark Mode</button>
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
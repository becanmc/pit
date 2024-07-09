<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}

$email = $_SESSION["email"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title> Usuário</title>
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
    
    .asbtn{
        color: black;
        border: 1px solid black;
        border-radius: 10px;
        text-decoration: none;
        padding: 0.3vw;
        font-size: 14px;
    }

    .dark-mode .asbtn{
        color: white;
        border: 1px solid white;
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
</head>
<body>
<button class="btn-dark-mode" onclick="darkMode()">Dark Mode</button>
    <div class="container">
    <?php 
    require_once "database.php";

    $sql = "SELECT full_name from users where email='$email'";
    $result = $conn -> query($sql);
    

    if($result -> num_rows > 0){
        while($row = $result-> fetch_assoc()){
            echo "<p> Bem vindo(a) ". $row["full_name"] ."!</p>";
        }
    } else {
        echo "0 results";
    }

    echo "<p> Seu email é: $email </p>"; 

   $conn -> close();
    ?> 
        <p> Deseja redefinir sua senha? <a href="password.php"> Redefinir senha </a></p>

        <a href="logout.php"  class="asbtn"> Deslogar </a>
    </div>
</body>
</html>

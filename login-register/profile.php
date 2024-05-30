<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: index.php");
}

$email = $_SESSION["email"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table with bd</title>
</head>
<body>

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
</body>
</html>
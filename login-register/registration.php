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
</head>
<body>
<button class="btn-dark-mode" onclick="darkMode()">Dark Mode</button>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"Todos os campos devem ser preenchidos");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email inválido");
           }
           if (strlen($password)<8) {
            array_push($errors,"Senha deve ter no mínimo 8 caracteres");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Senha incorreta");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email já registrado!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'> Registro feito com sucesso.</div>";
            }else{
                die("Algo deu errado");
            }
           }
          

        }
        ?>

        <h1 class="form-group"> Criar conta </h1>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Nome">
            </div>
            <div class="form-group">
                <input type="emamil" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Senha">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repetir senha">
            </div>
            <div class="form-btn form-group">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
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
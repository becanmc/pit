<?php

if (isset($_POST["reset-password-submit"])) {
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];


    if (empty($password) || empty($passwordRepeat)) {
        header("Location: login.php"); // ou o link com os tokens
        exit();
    } else if ($password != $passwordRepeat){
        header("Location: login.php");
        exit();
    } 

    $currentDate = date("Y-m-d H:i:s");
    var_dump($currentDate);
    require "database.php";

    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?"; 
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<div class='alert alert-danger'> Houve um erro </div>";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate); // 'ss' indica que ambos os parâmetros são strings
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if(!$row = mysqli_fetch_assoc($result)) { // Nao achou nada no banco
            var_dump($selector);
            echo "<div class='alert alert-danger'> 1 Tente Novamente! </div>";
            exit();
        } else {
            $tokenBin = hex2bin($validator);    
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
            if ($tokenCheck === false ) {
                echo "<div class='alert alert-danger'>  Os tokens não batem! </div>";
                exit();
            } elseif ($tokenCheck === true) {

                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM users WHERE email=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "<div class='alert alert-danger'> 3 Houve um erro </div>";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if(!$row = mysqli_fetch_assoc($result)) {
                        echo "<div class='alert alert-danger'> 4 Houve um erro! </div>";
                        exit();
                    } else {
                        $sql = "UPDATE users SET password=?  WHERE email=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "<div class='alert alert-danger'> 5 Houve um erro </div>";
                            exit();
                        } else {
                            $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "<div class='alert alert-danger'>6 Houve um erro </div>";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: login.php?newpwd=passwordupdated");
                            }

                        }

                    }
                    
                }
                
            }
        }
    }


} else {
    header("Location: login.php");
}



?>
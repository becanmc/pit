<?php
session_start();

if (isset($_POST["delete-button"], $_POST["user_id"])) {
    if (!isset($_SESSION["id"])) {
        header("Location: loginStartup.php");
        exit();
    }
    
   
    $user_id_to_delete = intval($_POST["user_id"]);
    var_dump($user_id_to_delete);
    
    
    $current_user_id = intval($_SESSION["id"]);
    if ($user_id_to_delete !== $current_user_id) {
        
        header("Location: indexStartup.php"); 
    }
    
    
    require_once "database.php";
    $sql = "DELETE FROM startups WHERE id = ?";

    $stmt = mysqli_stmt_init($conn);
    // ...
    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt, "i", $user_id_to_delete);


        mysqli_stmt_execute($stmt);
        header("Location: loginStartup.php?delete=deletado");
        exit(); 
    } else {
        die("Algo deu errado ao preparar a declaração SQL");
    }
    




}
?>

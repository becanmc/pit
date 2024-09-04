<?php
session_start();
if (isset($_POST["submit-post"], $_POST["user_id"])) {
    if (!isset($_SESSION["id"])) {
        header("Location: loginStartup.php");
        exit();
    } else {

        require_once "database.php";

        $startup_id = $_POST["user_id"];
        $post_title = $_POST["post-title"];
        $post_category = $_POST["post-category"];
        $post_author = $_POST["post-author"];
        $post_description = $_POST["post-description"];
        $post_body = $_POST["post-body"];

        if (empty($post_title) OR empty($post_category) OR empty($post_author) OR empty($post_description) OR empty($post_body)) {
            echo "<div class='alert alert-danger'> Todos os campos devem ser preenchidos </div>";
        } else {
            $sql = "INSERT INTO post (post_title, post_category, post_author, post_description, post_body, startup_id) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql))  {
                mysqli_stmt_bind_param($stmt, "sssssi", $post_title, $post_category, $post_author, $post_description, $post_body, $startup_id);
                
                if (mysqli_stmt_execute($stmt)){
                    header("Location: indexStartup.php?publicar=publicado");
                    exit(); 
                } else {
                    echo "<div class='alert alert-danger'> Erro ao publicar post.</div>";
                }
            } else {
                die("<div class='alert alert-success'> Erro ao publicar post.</div>");
            }
        }   
    }
}  else {
    header("Location: login.php");
    exit();
}
?>

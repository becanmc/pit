<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: index.php");
}

if (isset($_POST["login"])) {
   $email = $_POST["email"];
   $password = $_POST["password"];
   require_once "database.php";
   $sql = "SELECT * FROM users WHERE email = ?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("s", $email);
   $stmt->execute();
   $result = $stmt->get_result();
   $user = $result->fetch_assoc();
   if ($user) {
       if (password_verify($password, $user["password"])) {
           session_start();
           $_SESSION["user"] = "yes";
           $_SESSION["user_id"] = $user["id"]; // Store user ID in session
           header("Location: index.php");
           die();
       } else {
           echo "<div class='alert alert-danger'>Senha incorreta</div>";
       }
   } else {
       echo "<div class='alert alert-danger'>Email incorreto ou inválido</div>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
</head>
<body>
    <h2>Edit Profile</h2>
    <form action="update_profile.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($current_name); ?>"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($current_email); ?>"><br>

        <label for="profile_pic">Profile Picture:</label>
        <input type="file" id="profile_pic" name="profile_pic"><br>
        <?php if ($current_profile_pic): ?>
            <img src="<?php echo htmlspecialchars($current_profile_pic); ?>" alt="Profile Picture" width="100"><br>
        <?php endif; ?>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Leave blank if not changing"><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
<?php 

session_start()

if(!isset($_SESSION["user"])){
    header("Location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h2>Bem vindo ao Dashboard, <?php echo $_SESSION["user"]; ?></h2>
       
        <p>Essa é uma página administrativa</p>
        <a href="profile.php">Ver Perfil</a> | <a href="logout.php">Logout</a>
</body>
</html>
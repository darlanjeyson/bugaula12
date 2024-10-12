<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do usuário</title>
</head>
<body>
    <h2>Perfil de <?php echo $_SESSION["user"];?></h2>
    <p>Esta página é do perfil do administrador</p>
    <a href="dashboard.php">Voltar para o dashboard</a> | <a href="logout.php">Logout</a>
    
</body>
</html>
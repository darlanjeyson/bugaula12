<?php 

session_start();

$error = "";

//Recebendo dados via JSON

$data = json_decode(file_get_contents("php://input"), true);

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $data["username"];
    $password = $data["password"];

    $valid_users = ["admin" => "admin@123"];

    if(array_key_exists($username, $valid_users)){
        if($password == $valid_users[$username]){
            $_SESSION["users"] = $username;
            header("Content-Type: application/json");

            echo json_encode(["status" => "success", "message" => "Login bem vindo"]);
            exit;

        }else{
                $error="Usuário ou senha incorreta.";
        }
        
        }else{
                $error="Usuário ou senha incorreta";

        }
        header("Content-Type: application/json");
        echo json_decode(["status" => "error", "message" => $error]);
        exit;   
         }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de login</title>

    <script>
        async function login() {
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;
            
            const response = await fetch("index.php" , {
                method: "POST",
                headers: {
                    "content-Type:" "application/json"
                },
                body: JSON.stringify({username, password})
            });

            const result =  await response.json();
            alert(result.message);
            if(result.status === "success"){
                window.location.href ="dashboard.php";
            }
        }


    </script>
</head>
<body>
    <h2>Login</h2>
    <form onsubmit="event.preventDefault(); login();">
        <label for="username">Usuário</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="login">
        </form>
</body>
</html>
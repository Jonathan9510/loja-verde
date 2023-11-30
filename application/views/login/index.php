<?php
session_start();

$allowed_username = "user";
$allowed_password = "senha"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if ($username === $allowed_username && $password === $allowed_password) {
        $_SESSION['user'] = $username;
        header('Location: index.php');
        exit;
    } else {
        echo "Credenciais inválidas. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        label, input[type="text"], input[type="password"], input[type="submit"] {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="password"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form method="post">
            <label for="username">Nome de Usuário:</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Entrar">
        </form>
    </div>
</body>
</html>


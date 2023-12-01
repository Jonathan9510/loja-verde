<?php
$loginController = new LoginController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginController->index();
}
?>


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
        <?php if(isset($_GET['erro'])) {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error: </strong> <?= $_GET['erro']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }?>
        <form method="post">
            <label for="login">Nome de Usuário:</label>
            <input type="text" name="login" id="login" required>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
            <input type="submit" value="Entrar">
        </form>
    </div>
</body>
</html>

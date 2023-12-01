<?php

use Application\core\Controller;
use Application\dao\UsuarioDAO;
use Application\models\Usuario;

class LoginController extends Controller
{

    const HOME_URL = "/home";
    const ERRO_URL = "/login";

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION)) session_start();

            $login = $_POST['login']; 
            $senha = $_POST['senha']; 
            

            if ($this->validateUser($login, $senha)) {
                $_SESSION["usuario"] = $login;
                $_SESSION["userLogado"] = true;
                header("Location: " . self::HOME_URL);
                exit();
            } else {
                if (!isset($_SESSION)) session_start();
                session_unset();
                session_destroy();
                header("Location: " . self::ERRO_URL.'?erro=Credenciais inválidas. Tente novamente');
            }
        }

        $this->view('login/index');
    }

    public function validateUser($login, $senha)
    {
        $usuarioDAO = new UsuarioDAO();
        $user = $usuarioDAO->findByLogin($login);
        
        if ($user && $senha == $user->getSenha()) {
            return true;
        }

        return false;
    }
}
?>

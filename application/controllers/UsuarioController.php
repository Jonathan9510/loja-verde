<?php

use Application\core\Controller;
use Application\dao\UsuarioDAO;
use Application\models\Usuario;

class UsuarioController extends Controller
{

    public function index()
    {
        $usuarioDAO = new UsuarioDAO();
        $usuarios = $usuarioDAO->findAll();
        $this->view('usuario/index', ['usuarios' => $usuarios]);
    }
    public function cadastrar()
    {
        $this->view('usuario/cadastrar');
    }
    public function salvar()
    {
        $nome = $_POST['nome_usuario'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        // COMO CONSTRUIR UM OBJETO usuario AQUI
        $usuario = new Usuario($nome, $login, $senha);

        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->salvar($usuario);

        $this->view('usuario/cadastrar', ["msg" => "Sucesso"]);
    }

    public function iniciarEditar($codigo)
    {
        // 1 - Buscar os dados 
        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->findById($codigo);
        // 2 - Mostrar na view
        $this->view('usuario/editar', ["usuario" => $usuario]);
    }

    public function atualizar()
    {
        //RECEBE OS DADOS
        $codigo = filter_input(INPUT_POST, "codigo");
        $nome = filter_input(INPUT_POST, "nome");
        $login = filter_input(INPUT_POST, "login");
        $senha = filter_input(INPUT_POST, "senha");

        //CRIA O OBJETO
        $usuario = new Usuario($nome, $login, $senha);
        $usuario->setCodigo($codigo);
        //CRIA O usuario DAO
        $usuarioDAO = new UsuarioDAO();
        $usuarioAtualizado = $usuarioDAO->atualizar($usuario);
        if ($usuarioAtualizado) {
            $msg = "Sucesso";
        } else {
            $msg = "Erro ao editar";
        }
        $this->view("usuario/editar", ["msg" => $msg, "usuario" => $usuarioAtualizado]);
    }

    public function deletar()
    {
        $codigo = filter_input(INPUT_POST, "codigo");
        $usuarioDAO = new UsuarioDAO();
        if ($usuarioDAO->deletar($codigo)) {
            $msg = "Sucessoooo";
        } else {
            $msg = "Deu errooo ";
        }
        $usuario = $usuarioDAO->findAll();
        $this->view("usuario/index", ["msg" => $msg, "usuario" => $usuario]);
    }

    public function pesquisar()
    {
        $filtro = filter_input(INPUT_POST, "login");

        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->pesquisar($filtro);
        $this->view("usuario/pesquisar", ["msg" => "", "usuario" => $usuario]);
    }
}

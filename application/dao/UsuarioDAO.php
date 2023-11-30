<?php

namespace Application\dao;

use Application\models\usuario;

class UsuarioDAO
{
    // Create (C)
    public function salvar($usuario)
    {
        $conexao = new Conexao(); // 1- Instancia o Objeto
        // 2- Recebe a conexão
        $conn = $conexao->getConexao();
        // 3 - Receber os dados da outra camada
        $nome =  $usuario->getNome();
        $login = $usuario->getLogin();
        $senha = $usuario->getSenha();
        // 4 - Monta o SQL
        $SQL = "INSERT INTO usuarios(codigo, nome, login, senha) 
VALUES (null, '$nome', '$login', '$senha')";
        if ($conn->query($SQL) === TRUE) {
            return true;
        } else {
            echo "Error: " . $SQL . "<br />" . $conn->error;
            return false;
        }
    }

    public function findById($id)
    {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        $SQL = "SELECT * FROM usuarios WHERE codigo =" . $id;
        $result = $conn->query($SQL);
        $row = $result->fetch_assoc();
        $usuario = new Usuario($row["nome"], $row["login"], $row["senha"]);
        $usuario->setCodigo($row["codigo"]);
        return $usuario;
    }

    public function atualizar($usuario)
    {


        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        $codigo = $usuario->getCodigo();
        $nome = $usuario->getNome();
        $login = $usuario->getLogin();
        $senha = $usuario->getSenha();
        $SQL = "UPDATE usuarios SET nome = '$nome', login = '$login',
   senha = '$senha' WHERE codigo =" . $codigo;

        if ($conn->query($SQL) === TRUE) {
            return $this->findById($codigo);
        }
        print_r("Error: " . $SQL . "<br />" . $conn->error);
        return $usuario;
    }

    public function deletar($id)
    {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        $SQL = "delete from usuarios where codigo = " . $id;
        if ($conn->query($SQL) === TRUE) {
            return true;
        }
        return false;
    }

    public function findAll()
    {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        $SQL = "SELECT * FROM usuarios";
        $result = $conn->query($SQL);

        if (!$result) {
            die('Erro na consulta: ' . $conn->error);
        }

        $usuarios = [];

        while ($row = $result->fetch_assoc()) {
            $usuario = new Usuario($row["nome"], $row["login"], $row["senha"]);
            $usuario->setCodigo($row["codigo"]);
            array_push($usuarios, $usuario);
        }

        return $usuarios;
    }

    public function pesquisar($login)
    {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        $SQL = "SELECT * FROM usuarios WHERE login LIKE '%$login%'";

        $result = $conn->query($SQL);

        if (!$result) {
            die('Erro na consulta: ' . $conn->error);
        }

        $usuarios = [];

        while ($row = $result->fetch_assoc()) {
            $usuario = new Usuario($row["nome"], $row["login"], $row["senha"]);
            $usuario->setCodigo($row["codigo"]);
            array_push($usuarios, $usuario);
        }
        return $usuarios;
    }
}

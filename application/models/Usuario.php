<?php

namespace Application\models;

class Usuario
{
    private $codigo;
    private $nome;
    private $login;
    private $senha;
    public function __construct($nome, $login, $senha)
    {
        $this->nome = $nome;
        $this->login = $login;
        $this->senha = $senha;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getNome()
    {
        return $this->nome;
    }

    public function getlogin()
    {
        return $this->login;
    }
    public function getsenha()
    {
        return $this->senha;
    }
}

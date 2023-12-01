<?php

namespace Application\models;

class Produto
{
    private $codigo;
    private $nome;
    private $marca;
    private $preco;
    private $img;
    public function __construct($nome, $marca, $preco, $img)
    {
        $this->nome = $nome;
        $this->marca = $marca;
        $this->preco = $preco;
        $this->img = $img;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getImagem()
    {
        return $this->img;
    }
    public function getNome()
    {
        return $this->nome;
    }

    public function getMarca()
    {
        return $this->marca;
    }
    public function getPreco()
    {
        return $this->preco;
    }
}

<?php
namespace Application\dao;

use Application\models\Produto;

class ProdutoDAO {
    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    // Create (C)
    public function salvar($produto) {
        $conn = $this->conexao->getConexao();

        $nome = $produto->getNome();
        $marca = $produto->getMarca();
        $preco = $produto->getPreco();

        $SQL = "INSERT INTO produtos(nome, marca, preco) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("sss", $nome, $marca, $preco);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $SQL . "<br />" . $conn->error;
            return false;
        }
    }

    public function findAll() {
        $conn = $this->conexao->getConexao();
        $SQL = "SELECT * FROM produtos";
        $result = $conn->query($SQL);

        $produtos = [];
        while ($row = $result->fetch_assoc()) {
            $produto = new Produto($row["nome"], $row["marca"], $row["preco"], $row["img"]);
            $produto->setCodigo($row["codigo"]);
            array_push($produtos, $produto);
        }

        return $produtos;
    }

    // Retrieve (R)
    public function findById($id) {
        $conn = $this->conexao->getConexao();
        $SQL = "SELECT * FROM produtos WHERE codigo = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $produto = new Produto($row["nome"], $row["marca"], $row["preco"], $row["codigo"]);
        $produto->setCodigo($row["codigo"]);
        return $produto;
    }

    // Update (U)
    public function atualizar($produto) {
        $conn = $this->conexao->getConexao();

        $codigo = $produto->getCodigo();
        $nome = $produto->getNome();
        $marca = $produto->getMarca();
        $preco = $produto->getPreco();

        $SQL = "UPDATE produtos SET nome = ?, marca = ?, preco = ? WHERE codigo = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("sssi", $nome, $marca, $preco, $codigo);

        if ($stmt->execute()) {
            return $this->findById($codigo);
        } else {
            print_r("Error: " . $SQL . "<br />" . $conn->error);
            return $produto;
        }
    }

    // Delete (D)
    public function deletar($id) {
        $conn = $this->conexao->getConexao();

        $SQL = "DELETE FROM produtos WHERE codigo = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>

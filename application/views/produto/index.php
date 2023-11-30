<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';
?>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <h1> Listar Produtos </h1>
    <hr />
    <?php if (isset($data['msg'])) { ?>
        <div class="alert alert-danger" role="alert"> Sucesso </div>
    <?php } ?>
    <p> <a href="/produto/cadastrar"> Adicionar Produto </a> </p>
    <table class="table">
        <thead>
            <th>Código</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Preço</th>
            <th>Editar</th>
            <th>Deletar</th>
        </thead>
        <tbody>
            <?php foreach ($data['produtos'] as $produto) { ?>
                <tr>
                    <td><?= $produto->getCodigo() ?> </td>
                    <td><?= $produto->getNome() ?> </td>
                    <td><?= $produto->getMarca() ?> </td>
                    <td><?= $produto->getPreco() ?> </td>
                    <td>
                        <a href="/produto/iniciarEditar/<?= $produto->getCodigo() ?>">
                            EDITAR
                        </a>
                    </td>
                    <td>    
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $produto->getCodigo() ?>">
                            DELETAR
                        </button>
                        <div class="modal fade" id="deleteModal<?= $produto->getCodigo() ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Tem certeza de que deseja excluir este produto?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <form action="/produto/deletar" method="post">
                                            <input type="hidden" value="<?= $produto->getCodigo() ?>" name="codigo" />
                                            <input type="submit" class="btn btn-danger" value="Confirmar Exclusão" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

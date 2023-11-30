<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';
?>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <h1> Listar Usuários </h1>
    <hr />
    <?php if (isset($data['msg'])) { ?>
        <div class="alert alert-danger" role="alert"> Sucesso </div>
    <?php } ?>
    <p> <a href="/usuario/cadastrar"> Adicionar Usuário </a> </p>
    <p> <a href="/usuario/pesquisar"> Pesquisar Usuário </a> </p>
    <table class="table">
        <thead>
            <th>Código</th>
            <th>Nome</th>
            <th>Login</th>
            <th>Senha</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php
            if (isset($data['usuarios']) && is_array($data['usuarios'])) {
                foreach ($data['usuarios'] as $usuario) {
            ?>
                    <tr>
                        <td><?= $usuario->getCodigo() ?> </td>
                        <td><?= $usuario->getNome() ?> </td>
                        <td><?= $usuario->getLogin() ?> </td>
                        <td><?= $usuario->getSenha() ?> </td>
                        <td>
                            <a href="/usuario/iniciarEditar/<?= $usuario->getCodigo() ?>">
                                EDITAR
                            </a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $usuario->getCodigo() ?>">
                                X
                            </button>
                            <div class="modal fade" id="deleteModal<?= $usuario->getCodigo() ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Tem certeza de que deseja excluir este usuário?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <form action="/usuario/deletar" method="post">
                                                <input type="hidden" value="<?= $usuario->getCodigo() ?>" name="codigo" />
                                                <input type="submit" class="btn btn-danger" value="Confirmar Exclusão" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="5">Nenhum usuário encontrado.</td></tr>';
            }
            ?>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

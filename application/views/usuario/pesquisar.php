<?php
$base = __DIR__;
include $base . '\..\layout\menu.php'
//debug_print_backtrace();
?>
<h3> Pesquisar Usuário</h3>
<hr />
<form action="/usuario/pesquisar" method="post">
    <label for="login">Login:</label>
    <input type="text" name="login" id="login">
    <input type="submit" value="Pesquisar">
</form>
<?php if (isset($data['usuario'])) { ?>
    <h2>Resultados da Pesquisa</h2>
    <table class="table">
        <thead>
            <th>Nome</th>
            <th>Login</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($data['usuario'] as $usuario) { ?>
                <tr>
                    <td><?= $usuario->getNome() ?> </td>
                    <td><?= $usuario->getLogin() ?> </td>

                    <td>
                        <a href="/usuario/iniciarEditar/<?= $usuario->getCodigo() ?>">
                            EDITAR
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>
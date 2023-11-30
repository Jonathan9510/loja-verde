<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';
$usuario = $data['usuario'];
?>
<form class="form-control" method="POST" action="/usuario/atualizar">
    <input type="hidden" value="<?= $usuario->getCodigo() ?>" name="codigo" />
    <label class="label"> Nome </label>
    <input type="text" value="<?= $usuario->getNome() ?>" name="nome" class="form-control" />
    <label class="label"> Login </label>
    <input type="text" value="<?= $usuario->getLogin() ?>" name="login" class="form-control" />
    <label class="label"> Senha </label>
    <input type="text" value="<?= $usuario->getSenha() ?>" name="senha" class="form-control" />
    <div class="row" style="margin-top: 5px">
        <input type="submit" value="Alterar" class="btn btn-info" />
    </div>
</form>
<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';
//debug_print_backtrace();
?>
<?php
if (isset($data["msg"])) {
?>
  <div class="alert alert-success" role="alert"> Sucesso </div>
<?php } ?>
<form action="/usuario/salvar" method="POST" class="form-control">
  <label> Nome Usuario </label>
  <input type="text" name="nome_usuario" class="form-control" />
  <label> Login </label>
  <input type="text" name="login" class="form-control" />
  <label> Senha </label>
  <input type="password" name="senha" class="form-control" />
  <input type="submit" value="Cadastrar" class="form-control" />
</form>
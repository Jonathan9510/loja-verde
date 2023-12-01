<?php
if (!isset($_SESSION)) session_start();

if (isset($_SESSION["userLogado"]) == false) {
  header("Location: /login");
}

?>

<ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/home/index">Início</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/produto/"> Produto</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/usuario/"> Usuário </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../logout"> Logout</a>
  </li>
</ul>
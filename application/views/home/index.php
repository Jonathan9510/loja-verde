<?php
session_start();
$base = __DIR__;
include $base . '\..\layout\menu.php';
//debug_print_backtrace();
?>
<html>

<head>

</head>

<body>
    <h4> Bem-Vindo </h4>
    <h1> Produtos </h1>
    <hr />

    <div class="container">
        <div class="row">
            <?php foreach ($data['produtos'] as $produto) { ?>
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="https://www.techsmith.com/blog/wp-content/uploads/2022/03/resize-image.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $produto->getNome() ?></h5>
                            <p class="card-text"><?= $produto->getMarca() ?></p>
                            <a href="#" class="btn btn-primary">R$ <?= $produto->getPreco() ?></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>
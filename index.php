<?php


include'./include/Global.php';
include'./include/Estoque.php';
$title = "Controle de Estoque";
include'./template/header.php';


?>

<?php salvar(); ?>

<form method="post">
    <div class="center">
        <h2 style="text-align: center;">Cadastro de Produtos</h2>
        Nome:               <input type="text" name="Nome" /></br>
        Valor:              <input type="text" name="Valor" /></br>
        Quantidade:         <input type="text" name="Quantidade" /></br>
        Data de Validade:   <input type="text" name="Data" /></br>
                            <input type="submit" value="Cadastrar" name="botao"/>
    </div>
</form>

<?php
include'./template/footer.php';
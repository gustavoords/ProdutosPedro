<?php


include'./include/Global.php';
include'./include/Estoque.php';
$title = "Controle de Estoque";
include'./template/header.php';


?>

<?php salvar(); ?>
<center>
<form method="post">
    <div class="center">
        <h2>Cadastro de Produtos</h2>
        Nome:<p><input type="text" name="Nome" /></br>
        Valor: </br><input type="text" name="Valor" /></br>
        Quantidade: </br><input type="text" name="Quantidade" /></br>
 Data de Validade:</br><input type="text" name="Data" /></br></br>
           <input type="submit" value="Cadastrar" name="botao"/>
    </div>
</form>
    </center>

<?php
include'./template/footer.php';
<?php


include'./include/Global.php';
include'./include/Estoque.php';
$title = "Controle de Estoque";
include'./template/header.php';


?>
<div class="center">
<table style="width: 100%;">
    <tr style="background: #CCC">
        <th></th>
        <th>Id</th>
        <th>Nome</th>
        <th>Valor</th>
        <th>Quantidade</th>
        <th>Data de validade</th>
        <th> 
</th>>
    </tr>
    
    </div>
    <?php
        excluir();
        listar();
     
     include'./template/footer.php';
     ?>
    
    
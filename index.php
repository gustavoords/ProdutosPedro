<?php


include'./include/Global.php';
include'./template/footer.php';



$title="Controle de Estoque";?>


<form method="post">
    <div class="center">
        Nome:               <input type="text" name="Nome" />
        Valor:              <input type="text" name="Valor" />
        Quantidade:         <input type="text" name="Quantidade" />
        Data de Validade:  <input type="text" name="Data" />
                            <input type="submit" value="Cadastrar" name="botao"/>
    </div>
</form>

<?php
include'./template/header.php';
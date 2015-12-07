<?php

if(file_exists("Global.php")){ /* verifica se arquivo existe */
    include_once './Global.php';
}else if(file_exists("includes/Global.php")){
    include_once './includes/Global.php';
}

function salvar() {
    if(
        isset($_POST['nome']) and
        isset($_POST['valor']) and
        isset($_POST['qtd'])
    ){
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $qtd = $_POST['qtd'];
        
        $data = (isset($_POST['data']) ? $_POST['data'] : "");
        
        $SQL = "INSERT INTO produto (nome,valor,quantidade,data_de_validade) values (:nome, :valor, :qtd, :data);";
        $preparo = conexao()->prepare($SQL);
        $preparo->bindValue("nome", $nome);
        $preparo->bindValue("valor", $valor);
        $preparo->bindValue("qtd", $qtd);
        $preparo->bindValue("data", $data);
        $preparo->execute();
        if($preparo->rowCount() == 1){
            echo "Sucesso!";
        }else{
            echo "Erro!";
        }
    }
}

function listar(){
    $SQL = "SELECT * FROM produto WHERE 1;";
    $preparo = conexao()->prepare($SQL);
    $preparo->execute();
    while ($linha = $preparo->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td><a href='?excluir=".$linha['Id']."'>Excluir</a></td>";
        echo "<td><a href='?editar=".$linha['Id']."'>Editar</a></td>";
        echo "<td>".$linha['Id']."</td>";
        echo "<td>".$linha['nome']."</td>";
        echo "<td>".$linha['valor']."</td>";
        echo "<td>".$linha['quantidade']."</td>";
        echo "<td>".$linha['data_de_validade']."</td>";
        echo "</tr>";
    }
}

function excluir() { //executando o delete
    if(isset($_GET['excluir'])){
        $id = $_GET['excluir'];
        $SQL = "DELETE FROM `produto` WHERE Id=:Id;";
        $prepare = conexao()->prepare($SQL);
        $prepare->bindValue(":Id", $id);
        $prepare->execute();
        if($prepare->rowCount() == 1){
            echo 'Produto excluído com Sucesso!';
        }else{
            echo 'Aconteceu algum erro!';
        }
    }
}

function editar_por_id() {
    if(isset($_GET['editar'])){
        $id = $_GET['editar'];
        $SQL = "SELECT * FROM produto WHERE Id = :Id;";
        $prepare = conexao()->prepare($SQL);
        $prepare->bindValue(":Id", $id);
        $prepare->execute();
        if($linha = $prepare->fetch(PDO::FETCH_ASSOC)){
            ?>
                <form method="post">
                    <input type="hidden" name="editar" value="<?= $linha['Id'] ?>"/>
                    Nome: 
                    <input type="text" name="nome" value="<?= $linha['nome'] ?>" />
                    Valor: 
                    <input type="text" name="valor" value="<?= $linha['valor'] ?>" />
                    Quantidade: 
                    <input type="text" name="qtd" value="<?= $linha['quantidade'] ?>" />
                    Data de Validade: 
                    <input type="text" name="data" value="<?= $linha['data_de_validade'] ?>" />
                    <input type="submit" value="Editar" />
                </form>
            <?php
        }
    }
}

                function editar() {
                    //aparecer tabela para editar
    if(
        isset($_POST['editar']) and
        isset($_POST['nome']) and
        isset($_POST['valor']) and
        isset($_POST['qtd']) and
        isset($_POST['data'])
    ){
        $SQL = "UPDATE produto SET nome=:nome, valor=:valor, quantidade=:quantidade, "
                . "data_de_validade=:data_de_validade WHERE Id=:Id;";
        $prepare = conexao()->prepare($SQL);
        $prepare->bindValue(":nome", $_POST['nome']);
        $prepare->bindValue(":valor", $_POST['valor']);
        $prepare->bindValue(":quantidade", $_POST['qtd']);
        $prepare->bindValue(":data_de_validade", $_POST['data']);
        $prepare->bindValue(":Id", $_POST['editar']);
        $prepare->execute();
        if($prepare->rowCount() == 1){
            header ("Location: /listagem.php");
        }
    }
}
<?php
if(file_exists("Global.php")){
    include_once './Global.php';
}
 else if(file_exists("includes/Global.php")){
    include_once '/include/Global.php';
 }
 
 function salvar(){
     
     if(
             isset($_POST['Nome']) and
             isset($_POST['Valor']) and
             isset($_POST['Quantidade']) 
     
 )
                
     {   
         $Nome=$_POST['Nome'];
         $Valor=$_POST['Valor'];
         $Quantidade=$_POST['Quantidade'];
         $Data=(isset($_POST['Data']) ? $_POST["Data"]:"");
         
         $SQL="INSERT INTO `produtos`(`Nome`, `Valor`, `Quantidade`, `Data`) values (:Nome, :Valor, :Quantidade, :Data);";
         $preparo = conexao()->prepare($SQL);
         $preparo->bindValue(":Nome",$Nome);
         $preparo->bindValue(":Valor",$Valor);
         $preparo->bindValue(":Quantidade",$Quantidade);
         $preparo->bindValue(":Data",$Data);
         $preparo->execute();
         
          if($preparo->rowCount() == 1){
              echo "Sucesso!";
          }else{
          echo 'Erro!';
          }
     }
 }
     
 function listar(){
        $SQL="SELECT * FROM produtos WHERE 1;";
        $preparo = conexao()->prepare($SQL);
        $preparo->execute();
        while($linha = $preparo->fetch(PDO::FETCH_ASSOC)){
            echo"<tr>";
            echo"<td><a value='Excluir' href='?Excluir=".$linha['Id']."'>Excluir</a></td>";
            echo"<td><a value='Editar' href='?Editar=".$linha['Id']."'>Editar</a></td>";
            echo"<td>".$linha['Id']."</td>";
            echo"<td>".$linha['Nome']."</td>";
            echo"<td>".$linha['Valor']."</td>";
            echo"<td>".$linha['Quantidade']."</td>";
            echo"<td>".$linha['Data']."</td>";
            echo"<tr>";
            
        }
     }
     
   function excluir(){ 
       //executando o delete
                         $sql11 = "DELETE FROM produtos where `Id`=:Id;";
                         $prepare = conexao()->prepare($sql11);
                         $prepare->bindValue(":Id", $_GET['Excluir']);
                         $prepare->execute();
                     }
    
                     function editar(){
                         //editando tabela
                         
                          $SQL="UPDATE * FROM produtos WHERE `Id`=:Id;;";
                          $preparo = conexao()->prepare($SQL);
                          $preparo->execute();
        while($linha = $preparo->fetch(PDO::FETCH_ASSOC)){
                    echo"<tr>";
                    echo"<td>".$linha['Id']."</td>";
                    echo"<td>".$linha['Nome']."</td>";
                    echo"<td>".$linha['Valor']."</td>";
                    echo"<td>".$linha['Quantidade']."</td>";
                    echo"<td>".$linha['Data']."</td>";
                    echo"<tr>";
            
        }
                         
                         
                     }
   
   
                
     
         
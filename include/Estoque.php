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
     



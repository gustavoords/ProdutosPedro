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
         $nome=$_POST['Nome'];
         $valor=$_POST['Valor'];
         $Quantidade=$_POST['Quantidade'];
         
         $SQL="";
         $preparo=  conexao()->prepare($SQL);
         //$preparo->bindValue("",$Nome);
         //$preparo->bindValue("",$Valor);
        // $preparo->bindValue("",$Quantidade);
         $preparo->execute();
         
          if($preparo->rowCount() == 1){
              echo "Sucesso!";
          }else{
          echo 'Erro!';
          }
     }
 }
     



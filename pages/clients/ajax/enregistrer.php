<?php 
include('../../connexion.php');
if(isset($_POST['nom_client']) and isset($_POST['num_tel_client']) and isset($_POST['type_client']))
{
  $nom_client = $_POST['nom_client'];
  $num_tel_client = $_POST['num_tel_client'];
  $type_client = $_POST['type_client'];
  $date_enregis=date('Y-m-d H:i:s');
 
  if(empty($nom_client) || empty($num_tel_client) || empty($type_client))
  {
    echo 0;
  } 
  if(!empty($nom_client) and  !empty($num_tel_client) and !empty($type_client)) 
    { 
      $req = $bdd->query('SELECT COUNT(id_client) AS nbre FROM clients');
      $req->execute();
      $res = $req->fetch();
      $nbre = $res['nbre'];
      if($nbre==0)
      {
       
        $code_initial = date('Y').'1';
        $req = $bdd->prepare('INSERT INTO clients(code_client,nom_client,type_client,numero_tel,date_enreg) VALUES(:a,:b,:c,:d,:e)');
        $req->execute(array(
          'a'=>$code_initial,
          'b'=>$nom_client,
          'c'=>$type_client,
          'd'=>$num_tel_client,
          'e'=>$date_enregis));
          
                   
        }
          elseif($nbre>=1){
          $req = $bdd->query('SELECT * FROM clients ORDER BY id_client DESC LIMIT 1');
          $req->execute();
          $res = $req->fetch();
          $last_code = $res['id_client'];
          $code_client = $last_code+1;
     
         
         $req = $bdd->prepare('INSERT INTO clients(code_client,nom_client,type_client,numero_tel,date_enreg) VALUES(:a,:b,:c,:d,:e)');
         $req->execute(array(
          'a'=>$code_client,
          'b'=>$nom_client,
          'c'=>$type_client,
          'd'=>$num_tel_client,
          'e'=>$date_enregis));
                                    
        }

           echo 1;
  
    }
  }
  
  ?>



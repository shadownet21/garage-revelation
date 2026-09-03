<?php 
include('../../connexion.php');
if(isset($_POST['plaque']) and isset($_POST['marque']) and isset($_POST['modele']) and isset($_POST['type_voiture']) and isset($_POST['numero_chassis']) and isset($_POST['id_client']) )
{
  $plaque = $_POST['plaque'];
  $marque =  strtoupper($_POST['marque']);
  $modele =  strtoupper($_POST['modele']);
  $type_voiture = $_POST['type_voiture'];
  $numero_chassis = $_POST['numero_chassis'];
  $id_client = $_POST['id_client'];
  $date_enregis=date('Y-m-d H:i:s');
 
  if(empty($plaque) || empty($marque) || empty($modele) || empty($type_voiture) || empty($id_client))
  {
    echo 0;
  } 
  if(!empty($plaque) and  !empty($marque) and !empty($modele) and !empty($type_voiture) and !empty($id_client) ) 
    { 
      $req = $bdd->query('SELECT COUNT(id_voiture) AS nbre FROM voitures');
      $req->execute();
      $res = $req->fetch();
      $nbre = $res['nbre'];
      if($nbre==0)
      {
       
        $code_initial = date('Ym').'1';
        $req = $bdd->prepare('INSERT INTO voitures(code_voiture,numero_plaque,marque_voiture,modele_voiture,numero_chassis,date_enreg,type_voiture,id_client) VALUES(:a,:b,:c,:d,:e,:f,:g,:h)');
        $req->execute(array(
          'a'=>$code_initial,
          'b'=>$plaque,
          'c'=>$marque,
          'd'=>$modele,
          'e'=>$numero_chassis,
          'f'=>$date_enregis,
          'g'=>$type_voiture,
          'h'=>$id_client
      ));
          
                   
        }
          elseif($nbre>=1){
          $req = $bdd->query('SELECT * FROM voitures ORDER BY id_voiture DESC LIMIT 1');
          $req->execute();
          $res = $req->fetch();
          $last_code = $res['code_voiture'];
          $code_voiture = $last_code+1;
     
         
          $req = $bdd->prepare('INSERT INTO voitures(code_voiture,numero_plaque,marque_voiture,modele_voiture,numero_chassis,date_enreg,type_voiture,id_client) VALUES(:a,:b,:c,:d,:e,:f,:g,:h)');
          $req->execute(array(
            'a'=>$code_voiture,
            'b'=>$plaque,
            'c'=>$marque,
            'd'=>$modele,
            'e'=>$numero_chassis,
            'f'=>$date_enregis,
            'g'=>$type_voiture,
            'h'=>$id_client
        ));
                                    
        }

           echo 1;
  
    }
  }
  
  ?>



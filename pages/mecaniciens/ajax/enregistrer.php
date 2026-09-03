<?php 
include('../../connexion.php');
if(isset($_POST['nom_mecano']) and isset($_POST['adresse_mecano']) and isset($_POST['num_tel_mecano']))
{
  $nom_mecano = $_POST['nom_mecano'];
  $adresse_mecano = $_POST['adresse_mecano'];
  $num_tel_mecano = $_POST['num_tel_mecano'];
  $date_enregis=date('Y-m-d H:i:s');
 
  if(empty($nom_mecano) || empty($adresse_mecano) || empty($num_tel_mecano))
  {
    echo 0;
  } 
  if(!empty($nom_mecano) and  !empty($adresse_mecano) and !empty($num_tel_mecano)) 
    { 
      $req = $bdd->query('SELECT COUNT(id_mecano) AS nbre FROM mecanos');
      $req->execute();
      $res = $req->fetch();
      $nbre = $res['nbre'];
      if($nbre==0)
      {
       
        $code_initial = date('Y').'7';
        $req = $bdd->prepare('INSERT INTO mecanos(code_mecano,nom_mecano,adresse_mecano,numero_telephone,date_enreg) VALUES(:a,:b,:c,:d,:e)');
        $req->execute(array(
          'a'=>$code_initial,
          'b'=>$nom_mecano,
          'c'=>$adresse_mecano,
          'd'=>$num_tel_mecano,
          'e'=>$date_enregis
        ));
          
                   
        }
          elseif($nbre>=1){
          $req = $bdd->query('SELECT * FROM mecanos ORDER BY id_mecano DESC LIMIT 1');
          $req->execute();
          $res = $req->fetch();
          $last_code = $res['code_mecano'];
          $code_mecano = $last_code+1;
     
         
          $req = $bdd->prepare('INSERT INTO mecanos(code_mecano,nom_mecano,adresse_mecano,numero_telephone,date_enreg) VALUES(:a,:b,:c,:d,:e)');
          $req->execute(array(
            'a'=>$code_mecano,
            'b'=>$nom_mecano,
            'c'=>$adresse_mecano,
            'd'=>$num_tel_mecano,
            'e'=>$date_enregis
          ));
                                    
        }

           echo 1;
  
    }
  }
  
  ?>



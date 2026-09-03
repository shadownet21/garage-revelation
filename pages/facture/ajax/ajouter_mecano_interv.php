<?php 
include('../../connexion.php');
if(isset($_POST['id_interv']) and isset($_POST['id_mecano'])  )

{
            $id_interv = $_POST['id_interv'];
            $id_mecano = $_POST['id_mecano'];
            $etat = 'Encours';
                       
            
  if(empty($id_interv) || empty($id_mecano) ){ echo 0; }
  else{
    //VERIFICATION 
    $req = $bdd->prepare('SELECT * FROM mecano_interv MI, interventions I WHERE MI.id_interv=I.id_interv AND I.etat = :etat AND id_mecano=:mecano AND MI.id_interv=:id_interv ');
    $req->execute(array(
        'mecano'=>$id_mecano,
        'id_interv'=>$id_interv,
        'etat'=>$etat

    )); 
        $res = $req->fetch();
        $nb_ligne =$req->rowCount();
          if($nb_ligne>0){
                //RELATION DEJA EXISTANTE 
                echo 2;                   

            }else if($nb_ligne<1){
            
            $req = $bdd->prepare('INSERT INTO mecano_interv(id_mecano,id_interv) VALUES(:a,:b)');
            $req->execute(array(
              'a'=>$id_mecano,
              'b'=>$id_interv)); 
             echo 1; 
              
          }
        }
        }
         
  ?>



<?php 
include('../../connexion.php');
if(isset($_POST['id_voiture']))

{
            $id_voiture = $_POST['id_voiture'];
            $date_debut = date('Y-m-d H:i:s');
            $date_fin = NULL;
            $etat = "Encours";
            $montant_main_doeuvre = NULL;
            
            
  if(empty($id_voiture)){ echo 0; }
  else{
    //VERIFICATION 
    $req = $bdd->query('SELECT count(id_interv) as nb_i FROM interventions ');
    $req->execute(); 
        $res = $req->fetch();
          $lignes = $res['nb_i'];
              if($lignes<1){  
                //TABLE VIDE

                $code_initial = date('Y').'9';
                              $req = $bdd->prepare('INSERT INTO interventions(code_interv,date_debut,date_fin,id_voiture,etat,montant_main_doeuvre) VALUES(:a,:b,:c,:d,:e,:f)');
                              $req->execute(array(
                                'a'=>$code_initial,
                                'b'=>$date_debut,
                                'c'=>$date_fin,
                                'd'=>$id_voiture,
                                'e'=>$etat,
                                'f'=>$montant_main_doeuvre
                                )); 
                
                             
                echo 1; } 
                  else if($lignes > 0)
            {
              //VERIFIER SI LA VOITURE N 'EST PAS DEJA SUJET D'UNE INTERVENTION EN COURS

              $req = $bdd->prepare('SELECT * FROM interventions WHERE id_voiture=:id_voiture AND etat=:etat');
              $req->execute(array(
                'id_voiture'=>$id_voiture,
                'etat'=>$etat
              ));

              $res = $req->fetch();
              $nb_lignes = $req->rowCount();

              if($nb_lignes>0){echo 2;}

              else if($nb_lignes==0){

              $req = $bdd->prepare('SELECT * FROM interventions ORDER BY id_interv DESC LIMIT 1');
              $req->execute();
              $res = $req->fetch();
              $last_code = $res['code_interv'];
              $code_interv = $last_code+1;
                       
              $req = $bdd->prepare('INSERT INTO interventions(code_interv,date_debut,date_fin,id_voiture,etat,montant_main_doeuvre) VALUES(:a,:b,:c,:d,:e,:f)');
              $req->execute(array(
                'a'=>$code_interv,
                'b'=>$date_debut,
                'c'=>$date_fin,
                'd'=>$id_voiture,
                'e'=>$etat,
                'f'=>$montant_main_doeuvre
                )); 
                           
                       
                            echo 1;
                          }
                
             }

            }
          }
         
  ?>



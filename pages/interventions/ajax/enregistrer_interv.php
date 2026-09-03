<?php 
include('../../connexion.php');
if(isset($_POST['id_voiture']) and isset($_POST['libelle_interv']) and isset($_POST['date_interv']))

{
            $id_voiture = $_POST['id_voiture'];
            $date_debut = date('Y-m-d H:i:s');
            $date_interv = $_POST['date_interv'];
            if(empty($date_interv)){
              $date_interv=$date_debut;
            }else{
              $date_interv = $_POST['date_interv'];
              if($date_interv > $date_debut){
                echo 404;
                die();
              }
            }
             
            $date_fin = NULL;
            $etat = "Encours";
            $montant_main_doeuvre = NULL;
            $libelle_interv = $_POST['libelle_interv'];
            
            
  if(empty($id_voiture) || empty($libelle_interv)){ echo 0; }
  else{
    //VERIFICATION 
    $req = $bdd->query('SELECT count(id_interv) as nb_i FROM interventions ');
    $req->execute(); 
        $res = $req->fetch();
          $lignes = $res['nb_i'];
              if($lignes<1){  
                //TABLE VIDE

                $code_initial = date('Y').'9';
                              $req = $bdd->prepare('INSERT INTO interventions(code_interv,libelle_intervention,date_debut,date_fin,id_voiture,etat,mmo) VALUES(:a,:b,:c,:d,:e,:f,:g)');
                              $req->execute(array(
                                'a'=>$code_initial,
                                'b'=>$libelle_interv,
                                'c'=>$date_debut,
                                'd'=>$date_fin,
                                'e'=>$id_voiture,
                                'f'=>$etat,
                                'g'=>$montant_main_doeuvre
                                )); 

                                $req = $bdd->query('SELECT * FROM interventions ORDER BY id_interv DESC LIMIT 1');
                                $req->execute();
                                $dnn = $req->fetch();
                                $id_interv = $dnn['id_interv'];
                                $a = "INIT";
                                $b=0;
                                
                                $req = $bdd->prepare('INSERT INTO factures(numero_facture,montant_facture,id_interv,statut) VALUES(:a,:b,:c,:d)');
                                $req->execute(array(
                                  'a'=>$a,
                                  'b'=>$b,
                                  'c'=>$id_interv,
                                  'd'=>$etat
                                ));
                
                                      echo 1;
                
                             
                 } 
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
                       
              $req = $bdd->prepare('INSERT INTO interventions(code_interv,libelle_intervention,date_debut,date_fin,id_voiture,etat,mmo) VALUES(:a,:b,:c,:d,:e,:f,:g)');
              $req->execute(array(
                'a'=>$code_interv,
                'b'=>$libelle_interv,
                'c'=>$date_debut,
                'd'=>$date_fin,
                'e'=>$id_voiture,
                'f'=>$etat,
                'g'=>$montant_main_doeuvre
                )); 

                //INSERT DANS FACTURE
                $req = $bdd->query('SELECT * FROM interventions ORDER BY id_interv DESC LIMIT 1');
                $req->execute();
                $dnn = $req->fetch();
                $id_interv = $dnn['id_interv'];

                $a = "INIT";
                $b=0;
                

                $req = $bdd->prepare('INSERT INTO factures(numero_facture,montant_facture,id_interv,statut) VALUES(:a,:b,:c,:d)');
                $req->execute(array(
                  'a'=>$a,
                  'b'=>$b,
                  'c'=>$id_interv,
                  'd'=>$etat
                ));

                           
                       
                            echo 1;
                          }
                
             }

            }
          }
         
  ?>



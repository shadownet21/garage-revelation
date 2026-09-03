<?php 
include('../../connexion.php');
if(isset($_POST['id_facture']) and isset($_POST['maindoeuvre']))

{
           $id_facture = $_POST['id_facture'];
           $maindoeuvre = $_POST['maindoeuvre'];
           $date_fin = $_POST['date_facture'];

           if(empty($date_fin))
           {
            $date_fin = date('Y-m-d H:i:s');
           }
           else
           {
            $date_fin = $_POST['date_facture'];
           }
            

           $statut = 'Closed';

          

           if(empty($id_facture) || empty($maindoeuvre)){echo 0;} 
           
           if(!empty($id_facture) and !empty($maindoeuvre)){

            if($maindoeuvre<0){echo 33;}
            
                else if($maindoeuvre>0){

                    //CLOTURE DE LA FACTURE

                    //RECHERCHE SI LA FACTURE N EST PAS DEJA CLOTURE

                    $check = $bdd->prepare('SELECT * FROM factures WHERE statut=:statut AND id_facture=:id_facture');
                    $check->execute(array(
                      'statut'=>$statut,
                      'id_facture'=>$id_facture));
                      $lignes = $check->rowCount();
                    if($lignes>0){echo 355; die();}
                      //RECHERCHER L'INTERVENTION DE LA FACTURE
                      $req = $bdd->prepare('SELECT * FROM factures WHERE id_facture=:id');
                      $req->execute(array('id'=>$id_facture));
                      $res = $req->fetch();
                      $id_intervention = $res['id_interv'];
                      //MISE A JOUR DE LA TABLE INTERVENTION
                      $req = $bdd->prepare('UPDATE interventions SET mmo=:mt,etat=:etat,date_fin=:datefin WHERE id_interv=:id');
                    $req->execute(array(
                      'mt'=>$maindoeuvre,
                      'etat'=>$statut,
                      'datefin'=>$date_fin,
                      'id'=>$id_intervention
                    ));
                    //VERIFIER S'IL Y A DES PIECES
                    $search = $bdd->prepare('SELECT * FROM interventions_pieces WHERE id_interv=:id');
                    $search->execute(array(
                      'id'=>$id_intervention));
                      $result = $search->fetch();
                     
                      $nb_lignes = $search->rowCount();

                      if($nb_lignes==0){ //      "Pas de pieces rechangée";
                       
                    $req = $bdd->prepare('UPDATE factures f SET montant_facture=:mt_fact, statut=:etat, date_facture=:datef WHERE f.id_facture=:id_facture');
                          $req->execute(array(
                            'mt_fact'=>$maindoeuvre,
                            'etat'=>$statut,
                            'id_facture'=>$id_facture,
                            'datef'=>$date_fin
                          ));  

                            echo 1;

                        }else if($nb_lignes>0){  //  "Existance de piece"
                          //RECUPERER LA SOMME DU MONTANT DES PIECES CHANGEE

                          $req = $bdd->prepare('SELECT id_interv FROM factures WHERE id_facture=:id');
                          $req->execute(array( 'id'=>$id_facture  ));
                          $dnn = $req->fetch();
                          $id_interv = $dnn['id_interv'];
                          //CALCUL DE LA SOMME DES MT DES PIECES 
                          $req = $bdd->prepare('SELECT SUM(prix_t_piece) AS prix_pieces_interv FROM interventions_pieces WHERE id_interv=:id');
                          $req->execute(array( 'id'=>$id_interv  ));
                          $dnn = $req->fetch();
                          $prix_total =  $dnn['prix_pieces_interv'];
                          
                          $apayer = $maindoeuvre+$prix_total;
                            
                          
      
                          //MISE A JOUR TABLE FACTURE 
      
                          $numero_facture = 'FACTREV0'.$id_intervention;
                          
                          $fin = $bdd->prepare('UPDATE factures SET  statut=:etat, numero_facture=:num WHERE id_facture=:id_facture');
                          $fin->execute(array(
                           
                            'etat'=>$statut,
                            'num'=>$numero_facture,
                            'id_facture'=>$id_facture
                            
                          )); 
      
                          $last = $bdd->prepare('UPDATE factures SET montant_facture=:mt_fact,date_facture=:datef WHERE id_facture=:id_facture AND id_interv=:id_interv');
                          $last->execute(array(
                            'mt_fact'=>$apayer,
                            'id_facture'=>$id_facture,
                            'id_interv'=>$id_intervention,
                            'datef'=>$date_fin
      
                            
                          )); 
      
                          echo 1;
                          
                       }
                        
                       

                   

                    
                    

                    

            }

           
        } 
            
    }
         
  ?>



<?php 
include('../../connexion.php');
if(isset($_POST['id_interv']))

{


 
           $id_interv = $_POST['id_interv'];
           $statut = 'En cours';

           if(empty($id_interv)){echo 0;} 
           
           if(!empty($id_interv)){

            $req = $bdd->prepare('SELECT * FROM factures WHERE id_interv=:id_interv');
            $req->execute(array(
              'id_interv'=>$id_interv));
              $res = $req->fetch();

              $id_facture = $res['id_facture'];
             
            

          //INITIALISATION DE LA FACTURE

        $req = $bdd->prepare('UPDATE factures SET statut=:statut WHERE id_facture=:id_facture');
        $req->execute(array(
          'id_facture'=>$id_facture,
          'statut'=>$statut
          
         
        ));
        //MISE A JOUR 
        $numero_facture = 'FACTREV0'.$id_interv;
        $req = $bdd->prepare('UPDATE factures SET numero_facture=:numfact WHERE id_facture=:id_facture');
        $req->execute(array(
          'id_facture'=>$id_facture,
          'numfact'=>$numero_facture
          
         
        ));

       

        echo 1;

           
            } 
            
        }
         
  ?>



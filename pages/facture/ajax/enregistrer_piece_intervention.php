<?php 
include('../../connexion.php');
if(isset($_POST['id_interv']) and isset($_POST['id_piece']) and isset($_POST['nb_piece']))

{

 $id_interv = $_POST['id_interv'];
 $id_piece = $_POST['id_piece'];
 $quantite = $_POST['nb_piece'];
 $date = date('Y-m-d H:i:s');

 if(empty($id_interv) || empty($id_piece) || empty($quantite)) {echo 0;}
 
 else if(!empty($id_interv) and !empty($id_piece) and !empty($quantite)) {

        //VERIFICATION DE L'EXISTENCE DE LA PIECE DANS L'INTERVENTION
        $req = $bdd->prepare('SELECT * FROM interventions_pieces WHERE id_piece=:piece and id_interv=:interv');
        $req->execute(array( 'piece'=>$id_piece, 'interv'=>$id_interv ));
        $res = $req->fetch();

        if($res){echo 202;}else{
        $req = $bdd->prepare('SELECT * FROM pieces WHERE id_piece=:piece ');
        $req->execute(array( 'piece'=>$id_piece ));
        $res = $req->fetch();
        $prix_piece = $res['prix_piece'];
        $mt_piece = $prix_piece*$quantite;

          $req = $bdd->prepare('INSERT INTO interventions_pieces(id_interv,id_piece,nb_piece,date_c,prix_t_piece) VALUES(:interv,:piece,:nb,:datec,:ptp)');
            $req->execute(array(
              'interv'=>$id_interv,
              'piece'=>$id_piece,
              'nb'=>$quantite,
              'datec'=>$date,
              'ptp'=>$mt_piece
            ));
      //CALCULER LE MONTANT FACT    
 /*      $req = $bdd->prepare('SELECT * FROM intervention_pieces ip, pieces p WHERE ip.id_piece=p.id_piece AND ip.id_interv=:id');
      $req->execute(array( 'id'=>$id_interv ));

      $mt_piece = 0;
     while($dnn = $req->fetch()) 
     {
            $prix_piece = $dnn['prix_piece'];
            $mt_piece = $prix_piece*$quantite;
     }

       //MAJ PRIX
       $req = $bdd->prepare('UPDATE interventions SET prix_articles=:prix WHERE id_interv=:interv');
       $req->execute(array( 'prix'=>$mt_piece, 'interv'=>$id_interv )); */
            
            //RECHERCHE DU CODE DE L'INTERVENTION
            $search = $bdd->prepare('SELECT * FROM interventions WHERE id_interv=:interv');
            $search->execute(array('interv'=>$id_interv ));
            $lignes = $search->fetch();
            $code_interv = $lignes['code_interv'];

            //MISE A JOUR DU NUMERO DE LA FACTURE
            $numfact = 'FACT'.$code_interv;

            $req = $bdd->prepare('UPDATE factures SET numero_facture=:numfact WHERE id_interv=:interv');
            $req->execute(array( 'numfact'=>$numfact, 'interv'=>$id_interv ));

                  echo 1;   

        }

            
      }
}       
  ?>



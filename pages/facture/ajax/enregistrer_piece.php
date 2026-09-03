<?php 
include('../../connexion.php');
if(isset($_POST['nom_piece']) and isset($_POST['prix_piece']))

{

 $nom_piece = utf8_decode($_POST['nom_piece']);
 $prix_piece = $_POST['prix_piece'];

 if(empty($nom_piece) || empty($prix_piece)) {echo 0;}
 
      else{

        //VERIFICATION DE L'EXISTENCE DE LA PIECE
        $req = $bdd->prepare('SELECT * FROM pieces WHERE libelle_piece=:nom');
        $req->execute(array( 'nom'=>$nom_piece ));
        $res = $req->fetch();

        if($res){echo 202;}else{

          $req = $bdd->prepare('INSERT INTO pieces(libelle_piece,prix_piece) VALUES(:piece,:prix)');
            $req->execute(array(
              'piece'=>$nom_piece,
              'prix'=>$prix_piece
            ));
                  echo 1;   

        }

            
      }
}       
  ?>



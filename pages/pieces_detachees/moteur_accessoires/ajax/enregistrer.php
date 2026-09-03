<?php 
include('../../../connexion.php');
if(isset($_POST['id_voiture']) and isset($_POST['nom_piece_moteur']) and isset($_POST['nbre_retrouve']))
{
  $id_voiture = $_POST['id_voiture'];
  $nom_piece_moteur = $_POST['nom_piece_moteur'];
  $nbre_retrouve = $_POST['nbre_retrouve'];
 
 
  if(empty($id_voiture) || empty($nom_piece_moteur) || empty($nbre_retrouve))
  {
    echo 0;
  } 
  if(!empty($id_voiture) and  !empty($nom_piece_moteur) and !empty($nbre_retrouve)) 
    { 
      $req = $bdd->query('SELECT COUNT(id_voiture) AS nbre FROM voitures');
      $req->execute();
      $res = $req->fetch();
      $nbre = $res['nbre'];
      if($nbre==0)
      {
       //ENREGISTRER DANS PIECES
        $code_initial = '16'.date('Y').'1'; //Avec 16 le numero de séquence de la lettre P désignant "PIECE"
        $req = $bdd->prepare('INSERT INTO pieces(code_piece,libelle_piece,id_categorie) VALUES(:a,:b,:c)');
        $req->execute(array(
          'a'=>$code_initial,
          'b'=>$nom_piece_moteur,
          'c'=>1
          ));

          //RECHERCHER L'ID DE LA PIECE
          $req = $bdd->prepare('SELECT * FROM pieces ORDER BY id_piece DESC LIMIT 1');
          $req->execute();
          $dnn = $req->fetch();
          $last_id_piece = $dnn['id_piece'];

          //ENREGISTRER DANS VOITURES_PIECES
          $date_enreg = date('Y-m-d H:i:s');
          $req = $bdd->prepare('INSERT INTO voitures_pieces(id_voiture,id_piece,qtte_stock,date_enreg) VALUES(:a,:b,:c,:d)');
          $req->execute(array(
          'a'=>$id_voiture,
          'b'=>$last_id_piece,
          'c'=>$nbre_retrouve,
          'd'=>$date_enreg
          ));

           echo 1;
          
                   
        }
          elseif($nbre>=1){
          $req = $bdd->prepare('SELECT * FROM pieces ORDER BY id_piece DESC LIMIT 1');
          $req->execute();
          $res = $req->fetch();
          $last_code = $res['code_piece'];
          $code_piece = $last_code+1;
     
         
          $req = $bdd->prepare('INSERT INTO pieces(code_piece,libelle_piece,id_categorie) VALUES(:a,:b,:c)');
          $req->execute(array(
          'a'=>$code_piece,
          'b'=>$nom_piece_moteur,
          'c'=>1
          ));
          //RECHERCHER L'ID DE LA PIECE
          $req = $bdd->prepare('SELECT * FROM pieces ORDER BY id_piece DESC LIMIT 1');
          $req->execute();
          $dnn = $req->fetch();
          $last_id_piece = $dnn['id_piece'];
                                    
        }
          //ENREGISTRER DANS VOITURES_PIECES
          $date_enreg = date('Y-m-d H:i:s');
          $req = $bdd->prepare('INSERT INTO voitures_pieces(id_voiture,id_piece,qtte_stock,date_enreg) VALUES(:a,:b,:c,:d)');
          $req->execute(array(
          'a'=>$id_voiture,
          'b'=>$last_id_piece,
          'c'=>$nbre_retrouve,
          'd'=>$date_enreg
          ));

           echo 1;
  
    }
  }
  
  ?>



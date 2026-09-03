<?php 
include('../../../connexion.php');
if(isset($_POST['nom_piece_moteur']))
{
  $nom_piece_moteur = utf8_encode($_POST['nom_piece_moteur']);
 
 
 
  if(empty($nom_piece_moteur))
  {
    echo 0;
  } 
  if(!empty( $nom_piece_moteur )) 
    { 
          //ENREGISTRER DANS LA TABLE PIECES

          
          $req = $bdd->query('SELECT count(id_piece) as nbre FROM pieces');
          $req->execute();
          $res = $req->fetch();
          $nbre = $res['nbre'];

          if($nbre==0){

            
            //FIRST SAVING
            $code_initial = '3'.date('Y').'1'; //Avec 3 le numero de séquence de la lettre P désignant "Carosserie"
            $date_enreg = date('Y-m-d H:i:s');
            $req = $bdd->prepare('INSERT INTO pieces(code_piece,libelle_piece,id_categorie) VALUES(:a,:b,:c)');
            $req->execute(array(
            'a'=>$code_initial,
            'b'=>$nom_piece_moteur,
            'c'=>2
           
            ));
            echo 1;
          }
         
          if($nbre > 0){
            //RECHERCHER L'EXISTANCE DE LA PIECE
            $req = $bdd->prepare('SELECT * FROM pieces WHERE libelle_piece=:piece');
            $req->execute(array('piece'=>$nom_piece_moteur));
            $dnn = $req->fetch();

            if($dnn) { //OBJET TROUVE
              echo 2;
            } else {
              
            //RECHERCHE DU DERNIER ID
          
            $req = $bdd->prepare('SELECT * FROM pieces ORDER BY id_piece DESC LIMIT 1');
            $req->execute();
            $res = $req->fetch();
            $last_code = $res['code_piece'];
            $nouveau_code_piece = $last_code+1;

            //INSERTION 
            $req = $bdd->prepare('INSERT INTO pieces(code_piece,libelle_piece,id_categorie) VALUES(:a,:b,:c)');
            $req->execute(array(
            'a'=>$nouveau_code_piece,
            'b'=>$nom_piece_moteur,
            'c'=>2
            ));
              echo 1;
            }
        
       
      }
          
                   
        }
        
          
  }
  
  ?>



<?php 
include('../../../connexion.php');
if(isset($_POST['id_voiture']) and isset($_POST['id_piece']) and isset($_POST['nbre_retrouve']))
{
  $id_voiture = $_POST['id_voiture'];
  $id_piece = $_POST['id_piece'];
  $nbre_retrouve = $_POST['nbre_retrouve'];
 
 
  if(empty($id_voiture) || empty($id_piece) || empty($nbre_retrouve))
  {
    echo 0;
  } 
  if(!empty($id_voiture) and  !empty($id_piece) and !empty($nbre_retrouve)) 
    {
      if($nbre_retrouve<=0){
        echo 33;
      }elseif($nbre_retrouve>0){
      
       //RECHERCHER L'EXISTANCE DE LA PIECE
       $req = $bdd->prepare('SELECT * FROM voitures_pieces WHERE id_voiture=:id_voiture and id_piece=:id_piece');
       $req->execute(array('id_voiture'=>$id_voiture,'id_piece'=>$id_piece));
       $dnn = $req->fetch();

       if($dnn) { //OBJET TROUVE
         echo 22;
       } else {
        //ENREGISTRER DANS VOITURES_PIECES
        $date_enreg = date('Y-m-d H:i:s');
        $req = $bdd->prepare('INSERT INTO voitures_pieces(id_voiture,id_piece,qtte_stock,date_enreg) VALUES(:a,:b,:c,:d)');
        $req->execute(array(
        'a'=>$id_voiture,
        'b'=>$id_piece,
        'c'=>$nbre_retrouve,
        'd'=>$date_enreg
        ));

        echo 1;

       }
      }

          
          
                   
        }
        
          
  }
  
  ?>



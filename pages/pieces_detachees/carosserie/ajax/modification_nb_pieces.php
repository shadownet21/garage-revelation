<?php

include('../../../connexion.php');



if(isset($_POST['piece']) and isset($_POST['voiture']) and isset($_POST['ancienne_qtte']) and isset($_POST['nouvelle_quantite']))
 {
  $voiture = $_POST['voiture'];
  $piece = $_POST['piece'];
  $old = $_POST['ancienne_qtte'];
  $new =  $_POST['nouvelle_quantite'];

  $req = $bdd->prepare('SELECT * FROM voitures_pieces WHERE id_voiture=:v and id_piece=:p and qtte_stock=:old');
  $req->execute(array(
      'v'=>$voiture,
      'p'=>$piece,
      'old'=>$old
));

$dnn=$req->fetch();

while($dnn){

  $maj = $bdd->prepare('UPDATE voitures_pieces SET qtte_stock=:new WHERE id_voiture=:v and id_piece = :p and qtte_stock=:old');
  $maj->execute(array(
    'v'=>$voiture,
    'p'=>$piece,
    'old'=>$old,
    'new'=>$new

  ));
  
}
echo 100;

 }
?>

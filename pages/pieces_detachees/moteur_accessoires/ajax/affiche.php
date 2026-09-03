<?php

include('../../../connexion.php');

if(isset($_POST['id_pm']))
{

  $id_piece = $_POST['id_pm'];
    $req = $bdd->prepare('SELECT * FROM voitures_pieces VP, pieces P where VP.id_piece = P.id_piece AND VP.id_voiture=:id ORDER BY libelle_piece ASC');
    $req->execute(array('id' => $id_piece ));

    $formulaire='';
      
  
  while($dnn = $req->fetch()){

        $formulaire.='
        	         
  <form class="form-inline">
  <div class="form-group">                  
  <h1><span class="badge badge-info" style="width:100%">'.$dnn['libelle_piece'].'</span></h1>&nbsp;
  </div>  
  <div class="form-group">                  
  <h1><span class="badge badge-success" style="width:100%">'.$dnn['qtte_stock'].'</span></h1>&nbsp;
  </div>         
  </form>
                      
        '; }
echo $formulaire;


} 
 
?>

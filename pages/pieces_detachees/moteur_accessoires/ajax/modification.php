<?php

include('../../connexion.php');

if(isset($_POST['id']))
{

  $id = $_POST['id'];
    $req = $bdd->prepare('SELECT * FROM voitures where id_voiture=:id');
    $req->execute(array('id' => $id ));

    $formulaire='';
      
  
  while($dnn = $req->fetch()){

        $formulaire.='
        	         
  <div class="form-row">
                        
           <input class="form-control" type="hidden" id="id_voiture"  value="'.$dnn['id_voiture'].'" ><br>
           
           <label>Marque</label>
           <input class="form-control" value="'.$dnn['marque_voiture'].'" id="marque"><br>
                 
                 
          <label>Modele</label>
          <input class="form-control"  value="'.$dnn['modele_voiture'].'" id="modele"><br>
                 
              
          <label>Numero chassis</label>
          <input class="form-control" value="'.$dnn['numero_chassis'].'" id="numero_chassis"> <br>

          <label>Date arrivée</label>
          <input class="form-control"  value="'.$dnn['date_arrivee'].'"  id="date_arrivee"><br>
                 
  </div>
                                   
        '; }
echo $formulaire;


} 
 
?>

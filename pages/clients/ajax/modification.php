<?php

include('../../connexion.php');

if(isset($_POST['id']))
{

  $id = $_POST['id'];
    $req = $bdd->prepare('SELECT * FROM clients where id_client=:id');
    $req->execute(array('id' => $id ));

    $formulaire='';
      
  
  while($dnn = $req->fetch()){

        $formulaire.='
        	         
  <div class="form-row">
                        
           <input class="form-control" type="hidden" id="id_client"  value="'.$dnn['id_client'].'" ><br>
           
           <label>Nom</label>
           <input class="form-control" value="'.$dnn['nom_client'].'" id="nom_client"><br>
                 
                 
          <label>Type client</label>
          <select class="form-control" id="type_client">
          <option value="'.$dnn['type_client'].'">'.$dnn['type_client'].'</option>
          <option value="PHYSIQUE">Personne Physique</option>
          <option value="MORALE">Personne Morale</option>
          </select>
          <label>Numero telephone</label>
          <input class="form-control" value="'.$dnn['numero_tel'].'" id="numero_tel"> <br>

                           
  </div>
                                   
        '; }
echo $formulaire;


} 
 
?>

<?php

include('../../connexion.php');

if(isset($_POST['id']))
{

  $id = $_POST['id'];
    $req = $bdd->prepare('SELECT * FROM mecanos where id_mecano=:id');
    $req->execute(array('id' => $id ));

    $formulaire='';
      
  
  while($dnn = $req->fetch()){

        $formulaire.='
        	         
  <div class="form-row">
                        
           <input class="form-control" type="hidden" id="id_mecano"  value="'.$dnn['id_mecano'].'" ><br>
           
           <label>Nom</label>
           <input class="form-control" value="'.$dnn['nom_mecano'].'" id="nom_mecano"><br>
                 
           <label>Adresse</label>
           <input class="form-control" value="'.$dnn['adresse_mecano'].'" id="adresse_mecano"><br>
         
          <label>Numero telephone</label>
          <input class="form-control" value="'.$dnn['numero_telephone'].'" id="numero_telephone"> <br>

                           
  </div>
                                   
        '; }
echo $formulaire;


} 
 
?>

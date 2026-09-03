<?php 
include('../../connexion.php');
if(isset($_POST['id_interv']))

{

 
           $id_interv = $_POST['id_interv'];

            $req = $bdd->prepare('SELECT * FROM mecano_interv mi, mecanos m WHERE mi.id_mecano=m.id_mecano and mi.id_interv=:id_interv'); 
            $req->execute(array('id_interv'=>$id_interv));

        

            while($dnn = $req->fetch()){

              echo '<center><span class="badge badge-primary" style="font-size:25px">'.$dnn['nom_mecano'].'</span></center>'.'<br/>';
            } 
            
        }
         
  ?>




  <?php 
   //SUPPRESSION
   include('../../connexion.php');

if(isset($_POST['id_client']))
{
  $id=$_POST['id_client'];

                //RECUPERER SA VOITURE 
                $req = $bdd->prepare('SELECT * FROM voitures WHERE id_client=:id');
                $req->execute(array( 'id'=>$id ));
                $res = $req->fetch();
                $id_voiture = $res['id_voiture'];
         

      //SUPPRIMER LE CLIENT
        $req = $bdd->prepare('DELETE FROM clients WHERE id_client=:id');
        $req->execute(array( 'id'=>$id ));


            //SUPPRIMER LES VOITURES DU CLIENT
              $req = $bdd->prepare('DELETE FROM voitures WHERE id_client=:id');
              $req->execute(array( 'id'=>$id ));

                    
                    
                                       
  echo ' <span style="color:red">Supression...</span>';

  
}

  
  ?>



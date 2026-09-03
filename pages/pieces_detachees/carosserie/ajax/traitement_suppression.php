
  <?php 
   //SUPPRESSION
   include('../../connexion.php');

if(isset($_POST['id_voiture']))
{
  $id=$_POST['id_voiture'];

  $req = $bdd->prepare('DELETE FROM voitures WHERE id_voiture=:id');
  $req->execute(array( 'id'=>$id ));
   
 echo 'Supression...';

  
}

  
  ?>




  <?php 
   //SUPPRESSION
   include('../../connexion.php');

if(isset($_POST['id_mecano']))
{
  $id=$_POST['id_mecano'];

  $req = $bdd->prepare('DELETE FROM mecanos WHERE id_mecano=:id');
  $req->execute(array( 'id'=>$id ));

  $req = $bdd->prepare('DELETE FROM mecano_interv WHERE id_mecano=:id');
  $req->execute(array( 'id'=>$id ));
   
  echo ' <span style="color:red">Supression...</span>';

  
}

  
  ?>



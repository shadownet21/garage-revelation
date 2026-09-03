
  <?php 
   //SUPPRESSION
   include('../../connexion.php');

if(isset($_POST['id_interv']))
{
  $id=$_POST['id_interv'];

//SUPPRESSION DANS LA TABLE INTERVENTION
  $req = $bdd->prepare('DELETE FROM interventions WHERE id_interv=:id');
  $req->execute(array( 'id'=>$id ));
  //SUPPRESSION DES PIECES DE L'INTERVENTION
  $req = $bdd->prepare('DELETE FROM interventions_pieces WHERE id_interv=:id');
  $req->execute(array( 'id'=>$id ));
  //SUPPRESSION  DES MECANICIENS DE L'INTERVENTION
  $req = $bdd->prepare('DELETE FROM mecano_interv WHERE id_interv=:id');
  $req->execute(array( 'id'=>$id ));
  //SUPPRESSION DE LA FACTURE DE L'INTERVENTION
   
 echo ' <span style="color:red">Supression...</span>';

  
}

  
  ?>



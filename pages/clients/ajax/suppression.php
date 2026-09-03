
  <?php 
  
  include('../../connexion.php');

if(isset($_POST['id']))
{
//AFFICHE LES INFO A L'UTILISATEUR
  $id = $_POST['id'];

  $req = $bdd->prepare('SELECT * FROM clients WHERE id_client =:id');
  $req->execute(array( 'id'=> $id ));

  $dnn = $req->fetch();
  $nom = $dnn['nom_client'];
  

  echo $nom;
}
  
  ?>



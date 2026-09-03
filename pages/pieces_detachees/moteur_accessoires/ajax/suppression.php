
  <?php 
  
  include('../../connexion.php');

if(isset($_POST['id']))
{
//AFFICHE LES INFO A L'UTILISATEUR
  $id = $_POST['id'];

  $req = $bdd->prepare('SELECT * FROM voitures WHERE id_voiture =:id');
  $req->execute(array( 'id'=> $id ));

  $dnn = $req->fetch();
  $marque = $dnn['marque_voiture'];
  $modele = $dnn['modele_voiture'];

  echo $marque.' '.$modele;
}
  
  ?>



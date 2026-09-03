
  <?php 
  
  include('../../connexion.php');

if(isset($_POST['id_interv']))
{
//AFFICHE LES INFO A L'UTILISATEUR
  $id = $_POST['id_interv'];

  $req = $bdd->prepare('SELECT * FROM interventions WHERE id_interv =:id');
  $req->execute(array( 'id'=> $id ));

  $dnn = $req->fetch();
  $code_interv = $dnn['code_interv'];
  

  echo 'N°'.$code_interv;
}
  
  ?>



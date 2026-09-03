
  <?php 
   //MODIFICATION
   include('../../connexion.php');

if(isset($_POST['id']) and isset($_POST['nom_client']) and isset($_POST['type_client']) and isset($_POST['numero_tel']))
{
  $id=$_POST['id'];
  $nom_client = $_POST['nom_client'];
  $type_client = $_POST['type_client'];
  $numero_tel = $_POST['numero_tel'];
 

  $req = $bdd->prepare('UPDATE clients SET nom_client=:a,type_client=:b,numero_tel=:c WHERE id_client=:id');
  $req->execute(array(
    'a'=>$nom_client,
    'b'=>$type_client,
    'c'=>$numero_tel,
    'id'=>$id

  ));
  
 echo 1;

  
}

  
  ?>



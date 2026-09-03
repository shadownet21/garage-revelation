
  <?php 
   //MODIFICATION
   include('../../connexion.php');

if(isset($_POST['id']) and isset($_POST['marque']) and isset($_POST['modele']) and isset($_POST['numero_chassis']) and isset($_POST['date_arr']) and isset($_POST['plaque']))
{
  $id=$_POST['id'];
  $marque = $_POST['marque'];
  $modele = $_POST['modele'];
  $numero_chassis = $_POST['numero_chassis'];
  $date_arr =  $_POST['date_arr'];
  $plaque =  $_POST['plaque'];

  $req = $bdd->prepare('UPDATE voitures SET marque_voiture=:a,modele_voiture=:b,numero_chassis=:c,date_enreg=:d,numero_plaque=:e WHERE id_voiture=:id');
  $req->execute(array(
    'a'=>$marque,
    'b'=>$modele,
    'c'=>$numero_chassis,
    'd'=>$date_arr,
    'e'=>$plaque,
    'id'=>$id

  ));
  
 echo 1;

  
}

  
  ?>



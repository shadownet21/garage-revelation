
  <?php 
   //MODIFICATION
   include('../../connexion.php');

if(isset($_POST['id']) and isset($_POST['nom_mecano']) and isset($_POST['adresse_mecano']) and isset($_POST['numero_telephone']))
{
  $id=$_POST['id'];
  $nom_mecano = $_POST['nom_mecano'];
  $adresse_mecano = $_POST['adresse_mecano'];
  $numero_telephone = $_POST['numero_telephone'];
 

  $req = $bdd->prepare('UPDATE mecanos SET nom_mecano=:a,adresse_mecano=:b,numero_telephone=:c WHERE id_mecano=:id');
  $req->execute(array(
    'a'=>$nom_mecano,
    'b'=>$adresse_mecano,
    'c'=>$numero_telephone,
    'id'=>$id

  ));
  
 echo 1;

  
}

  
  ?>



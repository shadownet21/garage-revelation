
  <?php 
   //ENREGISTREMENT
  
if(isset($_POST['marque']) and isset($_POST['modele']) and isset($_POST['numero_chassis']))
{
  $marque = $_POST['marque'];
  $modele = $_POST['modele'];
  $numero_chassis = $_POST['numero_chassis'];
  $date_enregis = date('Y-m-d H:i:s');

  if(empty($marque) || empty($modele) || empty($numero_chassis))
  {
    echo 0;
  } 
  if(!empty($marque) and  !empty($modele) and !empty($numero_chassis)) 
  { 
    
    echo $marque.' '.$modele.' '.$numero_chassis.' '.$date_enregis;
    //RECHERCHE DE DONNEES

   /*  $req = $bdd->query('SELECT COUNT(id_voiture) AS nbre FROM voitures');
    $req->execute();
    $res = $req->fetch();
    $nbre = $res['nbre'];
    if($nbre==0){
      $code_initial = date('Y').'1';
      $req = $bdd->prepare('INSERT INTO voitures(code_voiture,marque_voiture,modele_voiture,date_arrivee,numero_chassis) VALUES(:1,:2,:3,:4,:5)');
      $req->execute(array(
        '1'=>$code_initial,
        '2'=>$marque,
        '3'=>$modele,
        '4'=>$numero_chassis,
        '5'=>$date_enregis));
        
        echo 1;
    }
 */
  
  }
 

  
}

  
  ?>


